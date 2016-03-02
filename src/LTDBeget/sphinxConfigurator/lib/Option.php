<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:04 PM
 */

namespace LTDBeget\sphinxConfigurator\lib;

/**
 * Class Option
 * @package LTDBeget\sphinxConfigurator\lib
 */
abstract class Option
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public static function getName() : string
    {
        return self::camelCaseToUnderscore(__CLASS__);
    }

    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return "{$this->getName()} = {$this->getValue()}";
    }

    /**
     * @return bool
     */
    abstract public function validate() : bool;

    /**
     * @param string $input
     * @return string
     */
    private static function camelCaseToUnderscore(string $input) : string
    {
        return ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $input)), '_');
    }
}