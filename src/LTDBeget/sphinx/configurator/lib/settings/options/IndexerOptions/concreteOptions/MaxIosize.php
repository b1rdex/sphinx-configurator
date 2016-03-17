<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 8:01 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\IndexerOption;

/**
 * Class MaxIosize
 *
 * maximum IO call size, bytes (for I/O throttling)
 * optional, default is 0 (unlimited)
 *
 * max_iosize		= 1048576
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\concreteOptions
 */
class MaxIosize extends IndexerOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}