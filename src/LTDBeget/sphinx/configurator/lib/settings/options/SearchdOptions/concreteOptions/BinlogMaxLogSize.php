<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:59 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class BinlogMaxLogSize
 *
 * binlog per-file size limit
 * optional, default is 128M, 0 means no limit
 *
 * binlog_max_log_size    = 256M
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class BinlogMaxLogSize extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}