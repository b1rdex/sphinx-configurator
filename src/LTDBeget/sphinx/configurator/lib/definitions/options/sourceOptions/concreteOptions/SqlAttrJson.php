<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class SqlAttrJson
 *
 * JSON attribute declaration
 * multi-value (an arbitrary number of these is allowed), optional
 * lets you store a JSON document as an (in-memory) attribute for later use
 *
 * sql_attr_json        = properties
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class SqlAttrJson extends SourceOption
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