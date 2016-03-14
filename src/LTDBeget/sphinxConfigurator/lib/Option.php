<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:04 PM
 */

namespace LTDBeget\sphinxConfigurator\lib;


use LTDBeget\sphinxConfigurator\helpers\CaseTransformerHelper;

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
        return CaseTransformerHelper::camelCase2SnakeCase((new \ReflectionClass(get_called_class()))->getShortName());
    }

    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->value;
    }

    /**
     * @param $value
     * @return void
     */
    public function setValue($value)
    {
        $this->value = $value;
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
    public function isMultiValue() : bool
    {
        return false;
    }

    /**
     * mark option as deleted
     */
    public function delete()
    {
       $this->isDeleted = true;
    }

    /**
     * is option marked as deleted
     * @return bool
     */
    public function isDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * @return bool
     */
    abstract public function validate() : bool;

    /**
     * @var boolean
     */
    private   $isDeleted = false;
}