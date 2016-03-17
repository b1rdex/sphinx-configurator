<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:19 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class HaPeriodKarma
 *
 * agent mirror statistics window size, in seconds
 * stats older than the window size (karma) are retired
 * that is, they will not affect master choice of agents in any way
 * optional, default is 60 seconds
 *
 * ha_period_karma			= 60
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class HaPeriodKarma extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}