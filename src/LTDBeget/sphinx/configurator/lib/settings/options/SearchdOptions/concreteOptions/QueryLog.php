<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:26 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class QueryLog
 *
 * query log file, all search queries are logged here
 * optional, default is empty (do not log queries)
 * query_log        = /var/log/sphinxsearch/query.log
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class QueryLog extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}