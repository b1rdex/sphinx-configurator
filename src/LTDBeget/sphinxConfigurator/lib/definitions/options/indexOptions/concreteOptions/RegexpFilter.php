<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class RegexpFilter
 *
 * regular expressions (regexps) to filter the fields and queries with
 * gets applied to data source fields when indexing
 * gets applied to search queries when searching
 * multi-value, optional, default is empty list of regexps
 * 
 * regexp_filter		= (blue|red) => color
 *
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions
 */
class RegexpFilter extends IndexOption
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