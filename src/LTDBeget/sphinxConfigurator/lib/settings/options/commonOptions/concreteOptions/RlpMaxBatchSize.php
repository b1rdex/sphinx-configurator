<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 6:59 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\CommonOption;

/**
 * Class RlpMaxBatchSize
 *
 * maximum total size of documents batched before processing them by the RLP
 * optional, default is 51200
 *
 * rlp_max_batch_size = 100k
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\concreteOptions
 */
class RlpMaxBatchSize extends CommonOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}