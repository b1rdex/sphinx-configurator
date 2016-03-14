<?php
/**
 * @author: Viskov Sergey
 * @date: 3/10/16
 * @time: 1:33 PM
 */

namespace LTDBeget\sphinxConfigurator\parser;


use LTDBeget\sphinxConfigurator\exceptions\SyntaxErrorException;

/**
 * Class SphinxConfigurationParser
 * @package LTDBeget\sphinxConfigurator\parser
 */
final class SphinxConfigurationParser
{
    /**
     * @param string $plainData
     * @return array
     */
    public static function parse(string $plainData) : array
    {
        $parser     = self::getInstance();
        $parsedData = $parser
            ->defineData($plainData)
            ->extractNodes()
            ->getParsedData();
        $parser->clear();

        return $parsedData;
    }

    /**
     * parsing of nodes in config (source, index, indexer, searchd, common)
     * @return SphinxConfigurationParser
     */
    private function extractNodes() : SphinxConfigurationParser
    {
        start:
        $ord = current($this->data);
        if(! $this->isEndFile($ord)) {
            $this->extractNode();
            $this->saveCurrentNode();
            $this->clearTemporaryStorage();
            $this->ignoreSpaceAndEndLine();
            goto start;
        }

        return $this;
    }

    /**
     * parsing of node in config (source, index, indexer, searchd, common)
     * @throws SyntaxErrorException
     */
    private function extractNode()
    {
        $this->currentNode = $this->getEmptyNodeData();

        $this->extractNodeType();

        switch ($this->currentNode["type"]) {
            case "source":
            case "index":
                $this->extractNodeName();
                $this->extractNodeInheritance();
                break;
            case "indexer":
            case "searchd":
            case "common":
                break;
            default:
                $this->throwSyntaxErrorException();
                break;
        }

        $this->extractOptions();
    }

    /**
     * parsing type of node in config (source, index, indexer, searchd, common)
     * @throws SyntaxErrorException
     */
    private function extractNodeType()
    {
        $this->ignoreSpaceAndEndLine();
        start:
        $ord = current($this->data);
        next($this->data);
        if ($this->isLetter($ord)) {
            $this->currentNode["type"] .= chr($ord);
            goto start;
        } elseif ($this->isSpace($ord) || $this->isTabulation($ord) || $this->isEndLine($ord) || $this->isEndFile($ord)) {
            return;
        } else {
            $this->throwSyntaxErrorException();
        }
    }

    /**
     * parsing name of source or index
     * @throws SyntaxErrorException
     */
    private function extractNodeName()
    {
        $this->ignoreSpace();
        start:
        $ord = current($this->data);
        next($this->data);

        if ($this->isLetter($ord) || $this->isDigit($ord) || $this->isUnderscore($ord)) {
            $this->currentNode["name"] .= chr($ord);
            goto start;
        } elseif ($this->isSpace($ord) || $this->isTabulation($ord) || $this->isEndLine($ord) || $this->isEndFile($ord)) {
            return;
        } elseif($this->isColon($ord)){
            prev($this->data);
            return;
        } else {
            $this->throwSyntaxErrorException();
        }
    }

    /**
     * parsing inheritance of source or index if has
     * @throws SyntaxErrorException
     */
    private function extractNodeInheritance()
    {
        $this->ignoreSpace();
        $ord = current($this->data);
        if ($this->isColon($ord)) {
            next($this->data);
            start:
            $ord = current($this->data);
            next($this->data);
            if ($this->isLetter($ord) || $this->isDigit($ord) || $this->isUnderscore($ord)) {
                $this->currentNode["inheritance"] .= chr($ord);
                goto start;
            } elseif ($this->isEndLine($ord)) {
                return;
            } elseif($this->isSpace($ord) || $this->isTabulation($ord)) {
                goto start;
            } else {
                $this->throwSyntaxErrorException();
            }
        }
    }

    /**
     * parsing options of node
     * @throws SyntaxErrorException
     */
    private function extractOptions()
    {
        $this->ignoreSpaceAndEndLine();

        if ($this->isOpenBrace(current($this->data))) {
            next($this->data);
            start:
            $this->ignoreSpaceAndEndLine();
            $ord = current($this->data);
            if ($this->isCloseBrace($ord)) {
                next($this->data);
                return;
            }
            $this->extractOption();
            goto start;
        } else {
            $this->throwSyntaxErrorException();
        }
    }

    /**
     * parsing concrete option
     * @throws SyntaxErrorException
     */
    private function extractOption()
    {
        $this->currentOption = $this->getEmptyOptionData();
        $this->extractOptionName();
        $this->extractOptionValue();

        $this->currentNode["options"][] = $this->currentOption;
    }

    /**
     * parsing concrete option name
     * @throws SyntaxErrorException
     */
    private function extractOptionName()
    {
        $this->ignoreSpaceAndEndLine();
        start:
        $ord = current($this->data);
        next($this->data);

        if ($this->isLetter($ord) || $this->isDigit($ord) || $this->isUnderscore($ord)) {
            $this->currentOption["name"] .= chr($ord);
            goto start;
        } elseif ($this->isSpace($ord) || $this->isTabulation($ord)) {
            return;
        } else {
            $this->throwSyntaxErrorException();
        }
    }

    /**
     * parsing concrete option value
     * @throws SyntaxErrorException
     */
    private function extractOptionValue()
    {
        $this->ignoreSpace();

        $ord = current($this->data);
        next($this->data);

        if (!$this->isEqualSign($ord)) {
            $this->throwSyntaxErrorException();
        }
        $this->ignoreSpace();

        start:
        $ord = current($this->data);
        next($this->data);

        if ($this->isMeanSymbol($ord)) {
            if($this->isBackslash($ord)) { // if possibility of multi-line
                if($this->isEndLine(current($this->data))) { // multi-line opened
                    next($this->data); // ignore end line
                    $this->ignoreSpace();
                    goto start;
                } else { // backslash as mean symbol
                    $this->currentOption["value"] .= chr($ord);
                    $this->currentOption["value"] .= chr(current($this->data));
                    goto start;
                }
            } else {
                $this->currentOption["value"] .= chr($ord);
                goto start;
            }
        } elseif ($this->isEndLine($ord)) {
            return;
        } else {
            $this->throwSyntaxErrorException();
        }
    }

    /**
     * @return SphinxConfigurationParser
     */
    private static function getInstance() : SphinxConfigurationParser
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct(){}
    private function __clone(){}

    /**
     * saves current parsed data from temporary storage to parsed data
     */
    private function saveCurrentNode()
    {
        $this->currentNode = array_filter($this->currentNode);
        $this->parsedData[] = $this->currentNode;
    }

    /**
     * @return array
     */
    private function getParsedData() : array
    {
        return $this->parsedData;
    }

    /**
     * format of node
     * @return array
     */
    private function getEmptyNodeData() : array
    {
        return [
            "type"        => "",
            "name"        => "",
            "inheritance" => "",
            "options"     => []
        ];
    }

    /**
     * format of option
     * @return array
     */
    private function getEmptyOptionData() : array
    {
        return [
            "name"  => "",
            "value" => ""
        ];
    }

    /**
     * clear parsed and plain data
     * @return SphinxConfigurationParser
     */
    private function clear() : SphinxConfigurationParser
    {
        $this->originalData = null;
        $this->data         = null;
        $this->parsedData   = [];

        return $this;
    }

    /**
     * clear temporary storage's of parsed data
     * @return SphinxConfigurationParser
     */
    private function clearTemporaryStorage() : SphinxConfigurationParser
    {
        $this->currentNode   = $this->getEmptyNodeData();
        $this->currentOption = $this->getEmptyOptionData();

        return $this;
    }

    /**
     * Split data on array of chars
     * @param String $data
     * @return SphinxConfigurationParser
     */
    private function defineData(string $data) : SphinxConfigurationParser
    {
        $this->originalData = $data;
        $this->data = $data;
        $this
            ->removeComments()
            ->splitData();

        return $this;
    }

    /**
     * remove all comments from configuration
     * @return SphinxConfigurationParser
     */
    private function removeComments() : SphinxConfigurationParser
    {
        $this->data = preg_replace("/(^#| #|	#).*\n/im", "\n", $this->data);

        return $this;
    }

    /**
     * split plain data to array of ords
     * @return SphinxConfigurationParser
     */
    private function splitData() : SphinxConfigurationParser
    {
        $this->data = unpack('C*', $this->data);

        return $this;
    }

    private function throwSyntaxErrorException()
    {
        print_r($this->parsedData);
        print_r($this->currentNode);
        throw new SyntaxErrorException(
            chr(current($this->data)),
            $this->originalData,
            $this->getParseErrorLineNumber()
        );
    }

    /**
     * @return int
     */
    private function getParseErrorLineNumber() : int
    {
        $parse_error_char_position = key($this->data);
        $plain_data = pack('c*', ...$this->data);
        $exploded_by_lines = explode("\n", $plain_data);
        foreach($exploded_by_lines as $key => $line) {
            $line_length = strlen($line)+1;
            $parse_error_char_position -= $line_length;
            if($parse_error_char_position < 0) {
                return $key + 1;
            }
        }
        return 1;
    }

    /**
     * ignore all spaces and ends line
     */
    private function ignoreSpaceAndEndLine()
    {
        start:
        $ord = current($this->data);

        if ($this->isEndLine($ord) || $this->isSpace($ord) || $this->isTabulation($ord) || $this->isTabulation($ord)) {
            next($this->data);
            goto start;
        }
    }

    /**
     * ignore all spaces in line
     */
    private function ignoreSpace()
    {
        start:
        $ord = current($this->data);

        if ($this->isSpace($ord) || $this->isTabulation($ord)) {
            next($this->data);
            goto start;
        }
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isMeanSymbol(int $ord) : bool
    {
        return $ord > 31;
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isSpace(int $ord) : bool
    {
        return $ord == 32;
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isTabulation(int $ord) : bool
    {
        return $ord == 9;
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isEndLine(int $ord) : bool
    {
        return $ord == 10;
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isEndFile(int $ord) : bool
    {
        return $ord == 0;
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isDigit(int $ord) : bool
    {
        return $ord >= 48 && $ord <= 57;
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isLetter(int $ord) : bool
    {
        return ($ord >= 65 && $ord <= 90) || ($ord >= 97 && $ord <= 122);
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isColon(int $ord) : bool
    {
        return $ord == 58;
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isOpenBrace(int $ord) : bool
    {
        return $ord == 123;
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isCloseBrace(int $ord) : bool
    {
        return $ord == 125;
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isUnderscore(int $ord) : bool
    {
        return $ord == 95;
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isEqualSign(int $ord) : bool
    {
        return $ord == 61;
    }

    /**
     * for understanding see link
     * @link http://www.asciitable.com/
     * @param int $ord
     * @return bool
     */
    private function isBackslash(int $ord) : bool
    {
        return $ord == 92;
    }

    /**
     * @var SphinxConfigurationParser
     */
    private static $instance = null;


    /**
     * config data as it is
     * @var string
     */
    private $originalData;

    /**
     * Spited by chars plain string
     * @var array
     */
    private $data = null;

    /**
     * Storage of parsed result as array
     * @var array
     */
    private $parsedData = [];

    /**
     * temporary storage of parsed data for one options block
     * @var array
     */
    private $currentNode = [
        "type"        => "",
        "name"        => "",
        "inheritance" => "",
        "options"     => []
    ];

    /**
     * temporary storage of parsed data for one option
     * @var array
     */
    private $currentOption = [
        "name"  => "",
        "value" => ""
    ];
}