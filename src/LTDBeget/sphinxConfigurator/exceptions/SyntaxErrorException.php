<?php
/**
 * @author: Viskov Sergey
 * @date: 3/10/16
 * @time: 6:27 PM
 */

namespace LTDBeget\sphinxConfigurator\exceptions;


use Exception;

/**
 * Class SyntaxErrorException
 * @package LTDBeget\sphinxConfigurator\exceptions
 */
class SyntaxErrorException extends \Exception
{
    /**
     * @var string
     */
    private $original_data;
    /**
     * @var int
     */
    private $error_line;
    /**
     * @var string
     */
    private $unexpected_char;


    /**
     * SyntaxErrorException constructor.
     * @param string $unexpected_char
     * @param string $original_data
     * @param int $error_line
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct
    (
        string $unexpected_char,
        string $original_data,
        int $error_line,
        int $code = 0,
        Exception $previous = null
    )
    {
        $message = "Sphinx configuration Parse error:  syntax error, unexpected '{$unexpected_char}' on line {$error_line}. ";
        $this->original_data = $original_data;
        $this->error_line = $error_line;
        $this->unexpected_char = $unexpected_char;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getOriginalData()
    {
        return $this->original_data;
    }

    /**
     * @return int
     */
    public function getErrorLine()
    {
        return $this->error_line;
    }

    /**
     * @return string
     */
    public function getUnexpectedChar()
    {
        return $this->unexpected_char;
    }
}