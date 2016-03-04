<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 8:03 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions\IndexerOption;

/**
 * Class WriteBuffer
 *
 * write buffer size, bytes
 * several (currently up to 4) buffers will be allocated
 * write buffers are allocated in addition to mem_limit
 * optional, default is 1M
 *
 * write_buffer		= 1M
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions\concreteOptions
 */
class WriteBuffer extends IndexerOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}