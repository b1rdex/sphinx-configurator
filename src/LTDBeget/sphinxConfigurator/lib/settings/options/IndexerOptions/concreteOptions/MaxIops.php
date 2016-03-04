<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 7:59 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions\IndexerOption;

/**
 * Class MaxIops
 *
 * maximum IO calls per second (for I/O throttling)
 * optional, default is 0 (unlimited)
 *
 * max_iops		= 40
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions\concreteOptions
 */
class MaxIops extends IndexerOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}