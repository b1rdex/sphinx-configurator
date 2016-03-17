<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:56 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class BinlogFlush
 *
 * binlog flush/sync mode
 * 0 means flush and sync every second
 * 1 means flush and sync every transaction
 * 2 means flush every transaction, sync every second
 * optional, default is 2
 *
 * binlog_flush        = 2
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class BinlogFlush extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}