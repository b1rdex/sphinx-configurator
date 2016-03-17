<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:04 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class RtFlushPeriod
 *
 * RT RAM chunks flush period
 * optional, default is 0 (no periodic flush)
 *
 * rt_flush_period        = 900
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class RtFlushPeriod extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}