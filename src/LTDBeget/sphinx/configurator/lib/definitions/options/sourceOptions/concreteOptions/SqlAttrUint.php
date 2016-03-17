<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class SqlAttrUint
 *
 * unsigned integer attribute declaration
 * multi-value (an arbitrary number of attributes is allowed), optional
 * optional bit size can be specified, default is 32
 *
 * sql_attr_uint        = author_id
 * sql_attr_uint        = forum_id:9
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class SqlAttrUint extends SourceOption
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