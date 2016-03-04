<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:12 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class RtMergeIops
 *
 * maximum RT merge thread IO calls per second, and per-call IO size
 * useful for throttling (the background) OPTIMIZE INDEX impact
 * optional, default is 0 (unlimited)
 *
 * rt_merge_iops			= 40
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class RtMergeIops extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}