<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class NgramLen
 *
 * n-gram length to index, for CJK indexing
 * only supports 0 and 1 for now, other lengths to be implemented
 * optional, default is 0 (disable n-grams)
 *
 * ngram_len        = 1
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class NgramLen extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}