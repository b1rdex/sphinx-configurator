<?php
/**
 * @author: Viskov Sergey
 * @date: 3/16/16
 * @time: 3:13 PM
 */

namespace LTDBeget\dev;


use DOMDocument;
use DOMElement;
use Symfony\Component\Yaml\Dumper;

/**
 * Functionality of class is parsing and dumping as yaml files sphinx documentation info on options
 * Class SphinxDocumentationParser
 * @package Dev
 */
final class SphinxDocumentationParser
{
    /**
     * Parse all sphinx configuration from self::$links
     * @throws \RuntimeException
     */
    public static function parseAll()
    {
        foreach (self::$links as $version => $link) {
            $parser = new SphinxDocumentationParser($link, $version);
            $parser->parse()->dump();
        }
    }

    /**
     * links via version on sphinx documentations
     * @var array
     */
    private static $links = [
        '2.2.10' => 'http://sphinxsearch.com/docs/current.html',
        '2.2.8'  => 'http://sphinxsearch.com/docs/archives/manual-2.2.8.html',
        '2.2.6'  => 'http://sphinxsearch.com/docs/archives/manual-2.2.6.html',
        '2.2.5'  => 'http://sphinxsearch.com/docs/archives/manual-2.2.5.html',
        '2.2.4'  => 'http://sphinxsearch.com/docs/archives/manual-2.2.4.html',
        '2.2.3'  => 'http://sphinxsearch.com/docs/archives/manual-2.2.3.html',
        '2.2.2'  => 'http://sphinxsearch.com/docs/archives/manual-2.2.2.html',
        '2.2.1'  => 'http://sphinxsearch.com/docs/archives/manual-2.2.1.html',
        '2.1.9'  => 'http://sphinxsearch.com/docs/archives/manual-2.1.9.html',
        '2.1.8'  => 'http://sphinxsearch.com/docs/archives/manual-2.1.8.html',
        '2.1.7'  => 'http://sphinxsearch.com/docs/archives/manual-2.1.7.html',
        '2.1.6'  => 'http://sphinxsearch.com/docs/archives/manual-2.1.6.html',
        '2.1.5'  => 'http://sphinxsearch.com/docs/archives/manual-2.1.5.html',
        '2.1.4'  => 'http://sphinxsearch.com/docs/archives/manual-2.1.4.html',
        '2.1.3' => 'http://sphinxsearch.com/docs/archives/manual-2.1.3.html',
        '2.1.2' => 'http://sphinxsearch.com/docs/archives/manual-2.1.2.html',
        '2.1.1' => 'http://sphinxsearch.com/docs/archives/manual-2.1.1.html',
    ];

    /**
     * @var string
     */
    private $link;
    /**
     * @var DOMDocument
     */
    private $document;
    /**
     * @var array
     */
    private $parsedDocumentation;
    /**
     * @var string
     */
    private $version;

    /**
     * SphinxDocumentationParser constructor.
     * @param string $link link on single page sphinx documentation
     * @param string $version
     */
    private function __construct(string $link, string $version)
    {
        $this->link                = $link;
        $this->parsedDocumentation = [];
        $this->version             = $version;
        $this->document            = new DOMDocument();
        $this->document->loadHTML(file_get_contents($this->link));
    }

    /**
     * save result of parsing as yaml file
     */
    private function dump()
    {
        $dumper = new Dumper();

        $yaml = $dumper->dump($this->parsedDocumentation, 4);

        $content = '';
        $content .= '# automatically generated from sphinx documentation' . PHP_EOL;
        $content .= "# version of documentation: {$this->version}" . PHP_EOL;
        $content .= "# link on documentation: $this->link" . PHP_EOL;
        $content .= $yaml;

        file_put_contents($this->getFileName(), $content);
    }

    /**
     * name of file for save parsed data
     * @return string
     */
    private function getFileName() : string
    {
        return $this->getPath() . "/documentation_{$this->version}.yaml";
    }

    /**
     * name of directory where needs to save parsed data
     * @return string
     */
    private function getPath() : string
    {
        return __DIR__ . '../../../sphinx/docs';
    }

    /**
     * @return SphinxDocumentationParser
     * @throws \RuntimeException
     */
    private function parse() : SphinxDocumentationParser
    {
        $nodes = $this->document->getElementsByTagName('a');
        foreach ($nodes as $node) {
            if (!($node instanceof DOMElement)) {
                continue;
            }

            if ($this->isSource($node)) {
                $this->parsedDocumentation['source'] = $this->parseSourceOptions($node);
            }

            if ($this->isIndex($node)) {
                $this->parsedDocumentation['index'] = $this->parseSourceOptions($node);
            }

            if ($this->isIndexer($node)) {
                $this->parsedDocumentation['indexer'] = $this->parseSourceOptions($node);
            }

            if ($this->isSearchd($node)) {
                $this->parsedDocumentation['searchd'] = $this->parseSourceOptions($node);
            }

            if ($this->isCommon($node)) {
                $this->parsedDocumentation['common'] = $this->parseSourceOptions($node);
            }
        }

        return $this;
    }

    /**
     * @param DOMElement $element
     * @return bool
     */
    private function isSource(DOMElement $element) : bool
    {
        return $element->hasAttribute('name') && $element->getAttribute('name') === 'confgroup-source';
    }

    /**
     * @param DOMElement $element
     * @return bool
     */
    private function isIndex(DOMElement $element) : bool
    {
        return $element->hasAttribute('name') && $element->getAttribute('name') === 'confgroup-index';
    }

    /**
     * @param DOMElement $element
     * @return bool
     */
    private function isIndexer(DOMElement $element) : bool
    {
        return $element->hasAttribute('name') && $element->getAttribute('name') === 'confgroup-indexer';
    }

    /**
     * @param DOMElement $element
     * @return bool
     */
    private function isSearchd(DOMElement $element) : bool
    {
        return $element->hasAttribute('name') && $element->getAttribute('name') === 'confgroup-searchd';
    }

    /**
     * @param DOMElement $element
     * @return bool
     */
    private function isCommon(DOMElement $element) : bool
    {
        return $element->hasAttribute('name') && $element->getAttribute('name') === 'confgroup-common';
    }

    /**
     * Parse source options
     * @param DOMElement $element
     * @return array
     * @throws \RuntimeException
     */
    private function parseSourceOptions(DOMElement $element) : array
    {
        $source_array = [];
        $sourceBlock  = $element->parentNode->parentNode->parentNode->parentNode->parentNode;
        foreach ($sourceBlock->childNodes as $optionNode) {
            if (!($optionNode instanceof DOMElement)) {
                continue;
            }

            if ($this->isSect2Element($optionNode)) {
                /** @noinspection SlowArrayOperationsInLoopInspection */
                $source_array = array_merge($this->parseOptionNode($optionNode), $source_array);
            }

        }

        return $source_array;
    }


    /**
     * parse concrete option block
     * @param DOMElement $element
     * @return array
     * @throws \RuntimeException
     */
    private function parseOptionNode(DOMElement $element) : array
    {
        $options_array = [];

        $option_names = $this->getOptionNames($element->firstChild);
        $link_anchor  = $this->getLinkTag($element);
        $description  = $this->getDescription($element);
        $isMultiValue = $this->isMultiValue($description);

        foreach ($option_names as $option_name) {
            $options_array[$option_name] = [
                'link'        => $this->link . $link_anchor,
                'multi_value' => $isMultiValue,
                'description' => $description
            ];
        }

        return $options_array;
    }

    /**
     * @param DOMElement $element
     * @return array
     */
    private function getOptionNames(DOMElement $element) : array
    {
        $optionName = $element->textContent;
        $optionName = htmlentities($optionName, null, 'utf-8');
        $optionName = str_replace('&nbsp;', '', $optionName);
        $optionName = trim(preg_replace("/\d*\.\d*\.\d*\./", '', $optionName));

        return explode(', ', $optionName);
    }

    /**
     * Get link on option in documentation
     * @param DOMElement $element
     * @return string
     * @throws \RuntimeException
     */
    private function getLinkTag(DOMElement $element) : string
    {
        $link_tag = null;
        foreach ($element->childNodes as $optionContent) {
            if (!($optionContent instanceof DOMElement)) {
                continue;
            }

            if ($this->isTitlePage($optionContent)) {
                $link_tag = '#' . $optionContent
                        ->firstChild
                        ->firstChild
                        ->firstChild
                        ->firstChild
                        ->getAttribute('name');
            }

        }
        if (null === $link_tag) {
            throw new \RuntimeException("Couldn't parse link anchor");
        }

        return $link_tag;
    }

    /**
     * Get full description of option
     * @param DOMElement $element
     * @return string
     */
    private function getDescription(DOMElement $element) : string
    {
        $this->removeTitlePage($element);

        return trim($element->nodeValue);
    }

    /**
     * Check is option is multi value option
     * @param string $description
     * @return bool
     */
    private function isMultiValue(string $description) : bool
    {
        $description  = strtolower($description);
        
        return false !== strpos($description, 'multi-value');
    }

    /**
     * remove title block from dom element
     * @param DOMElement $element
     */
    private function removeTitlePage(DOMElement $element)
    {
        foreach ($element->childNodes as $optionContent) {
            if ($this->isTitlePage($optionContent)) {
                $element->removeChild($optionContent);
            }
        }
    }

    /**
     * Check is element is title in option block
     * @param DOMElement $element
     * @return bool
     */
    private function isTitlePage(DOMElement $element)
    {
        return $element->hasAttribute('class') && $element->getAttribute('class') === 'titlepage';
    }

    /**
     * @param DOMElement $element
     * @return bool
     */
    private function isSect2Element(DOMElement $element) : bool
    {
        return $element->hasAttribute('class') && $element->getAttribute('class') === 'sect2';
    }
}