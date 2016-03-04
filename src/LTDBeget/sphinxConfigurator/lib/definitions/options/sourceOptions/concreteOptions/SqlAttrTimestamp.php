<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class SqlAttrTimestamp
 *
 * UNIX timestamp attribute declaration
 * multi-value (an arbitrary number of attributes is allowed), optional
 * similar to integer, but can also be used in date functions
 * 
 * sql_attr_timestamp	= posted_ts
 * sql_attr_timestamp	= last_edited_ts
 * sql_attr_timestamp	= date_added
 *
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class SqlAttrTimestamp extends SourceOption
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