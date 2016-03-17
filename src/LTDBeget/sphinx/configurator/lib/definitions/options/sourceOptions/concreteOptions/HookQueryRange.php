<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class HookQueryRange
 *
 * hook command to run after (any) SQL range query
 * it may print out 'minid maxid' (w/o quotes) to override the range
 * optional, default value is empty (do nothing)
 *
 * hook_query_range        = bash sql_query_range.sh
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class HookQueryRange extends SourceOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}