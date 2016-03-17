<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class IndexFieldLengths
 *
 * index per-document and average per-index field lengths, in tokens
 * required for the BM25A(), BM25F() in expression ranker
 * optional, default is 0 (do not index field lenghts)
 *
 * index_field_lengths    = 1
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class IndexFieldLengths extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}