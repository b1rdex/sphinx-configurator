<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:38 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class MaxFilterValues
 *
 * max allowed per-filter values count
 * optional, default is 4096
 * max_filter_values	= 4096
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class MaxFilterValues extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}