<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 12:32 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions\IndexerOption;

class MemLimit extends IndexerOption
{

    /**
     * memory limit, in bytes, kilobytes (16384K) or megabytes (256M)
     * optional, default is 128M, max is 2047M, recommended is 256M to 1024M
     *
     * @return bool
     */
    public function validate() : bool
    {
        // TODO: Implement validate() method.
        return true;
    }
}