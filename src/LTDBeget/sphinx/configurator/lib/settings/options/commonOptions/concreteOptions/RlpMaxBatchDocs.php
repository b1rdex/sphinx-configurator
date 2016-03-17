<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 7:01 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\CommonOption;

/**
 * Class RlpMaxBatchDocs
 *
 * maximum number of documents batched before processing them by the RLP
 * optional, default is 50
 *
 * rlp_max_batch_docs = 100
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\concreteOptions
 */
class RlpMaxBatchDocs extends CommonOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}