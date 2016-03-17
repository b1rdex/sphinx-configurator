<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:00 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class ExpansionLimit
 *
 * per-keyword expansion limit (for dict=keywords prefix searches)
 * optional, default is 0 (no limit)
 *
 * expansion_limit        = 1000
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class ExpansionLimit extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}