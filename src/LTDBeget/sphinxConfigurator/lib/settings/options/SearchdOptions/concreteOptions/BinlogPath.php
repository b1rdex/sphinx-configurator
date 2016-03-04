<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:55 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class BinlogPath
 *
 * binlog files path; use empty string to disable binlog
 * optional, default is build-time configured data directory
 *
 * binlog_path		= /var/lib/sphinxsearch/data # binlog.001 etc will be created there
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class BinlogPath extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}