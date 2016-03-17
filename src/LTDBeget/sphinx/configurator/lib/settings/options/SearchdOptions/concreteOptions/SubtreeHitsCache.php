<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:43 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;




use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class SubtreeHitsCache
 *
 * max common subtree hit cache size, per-query
 * optional, default is 0 (disable subtree optimization)
 * subtree_hits_cache	= 8M
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class SubtreeHitsCache extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}