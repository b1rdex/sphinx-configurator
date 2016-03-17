<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:14 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class RtMergeMaxiosize
 *
 * maximum RT merge thread IO calls per second, and per-call IO size
 * useful for throttling (the background) OPTIMIZE INDEX impact
 * optional, default is 0 (unlimited)
 *
 * rt_merge_iops			= 40
 * rt_merge_maxiosize		= 1M
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class RtMergeMaxiosize extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}