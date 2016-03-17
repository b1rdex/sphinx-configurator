<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:09 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;




use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class Watchdog
 *
 * threaded server watchdog (only used in workers=threads mode)
 * optional, values are 0 and 1, default is 1 (watchdog on)
 *
 * watchdog				= 1
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class Watchdog extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}