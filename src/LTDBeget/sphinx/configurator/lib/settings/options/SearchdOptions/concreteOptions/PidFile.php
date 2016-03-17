<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:31 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class PidFile
 *
 * PID file, searchd process ID file name
 * mandatory
 * pid_file        = /var/run/sphinxsearch/searchd.pid
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class PidFile extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}