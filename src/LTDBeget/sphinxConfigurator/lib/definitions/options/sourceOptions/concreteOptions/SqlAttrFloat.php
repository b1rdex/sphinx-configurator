<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class SqlAttrFloat
 *
 * floating point attribute declaration
 * multi-value (an arbitrary number of attributes is allowed), optional
 * values are stored in single precision, 32-bit IEEE 754 format
 * 
 * sql_attr_float		= lat_radians
 * sql_attr_float		= long_radians
 *
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class SqlAttrFloat extends SourceOption
{
    /**
     * @return bool
     */
    public function isMultiValue() : bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}