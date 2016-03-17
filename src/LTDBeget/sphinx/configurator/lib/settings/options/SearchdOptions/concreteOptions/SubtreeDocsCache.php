<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:42 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;




use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class SubtreeDocsCache
 *
 * max common subtree document cache size, per-query
 * optional, default is 0 (disable subtree optimization)
 * subtree_docs_cache	= 4M
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class SubtreeDocsCache extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}