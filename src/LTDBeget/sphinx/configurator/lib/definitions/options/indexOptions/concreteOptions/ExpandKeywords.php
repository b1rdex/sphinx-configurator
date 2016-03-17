<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class ExpandKeywords
 *
 * expand keywords with exact forms and/or stars when searching fit indexes
 * search-time only, does not affect indexing, can be 0 or 1
 * optional, default is 0 (do not expand keywords)
 *
 * expand_keywords        = 1
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class ExpandKeywords extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}