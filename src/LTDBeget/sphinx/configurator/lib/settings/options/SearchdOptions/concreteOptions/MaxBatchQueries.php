<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:42 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class MaxBatchQueries
 *
 * max allowed per-batch query count (aka multi-query count)
 * optional, default is 32
 * max_batch_queries	= 32
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class MaxBatchQueries extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}