<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class Dict
 *
 * dictionary type, 'crc' or 'keywords'
 * crc is faster to index when no substring/wildcards searches are needed
 * crc with substrings might be faster to search but is much slower to index
 * (because all substrings are pre-extracted as individual keywords)
 * keywords is much faster to index with substrings, and index is much (3-10x) smaller
 * keywords supports wildcards, crc does not, and never will
 * optional, default is 'keywords'
 * dict			= keywords
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class Dict extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}