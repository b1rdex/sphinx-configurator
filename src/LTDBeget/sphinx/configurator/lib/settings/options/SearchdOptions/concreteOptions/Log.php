<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class Log
 *
 * log file, searchd run info is logged here
 * optional, default is 'searchd.log'
 * log            = /var/log/sphinxsearch/searchd.log
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class Log extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}