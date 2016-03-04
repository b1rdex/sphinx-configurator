<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:37 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class MaxFilters
 *
 * max allowed per-query filter count
 * optional, default is 256
 * max_filters		= 256
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class MaxFilters extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}