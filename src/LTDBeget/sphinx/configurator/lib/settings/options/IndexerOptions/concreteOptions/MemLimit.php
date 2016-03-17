<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 12:32 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\IndexerOption;

/**
 * Class MemLimit
 *
 * memory limit, in bytes, kilobytes (16384K) or megabytes (256M)
 * optional, default is 128M, max is 2047M, recommended is 256M to 1024M
 * mem_limit		= 128M
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\concreteOptions
 */
class MemLimit extends IndexerOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}