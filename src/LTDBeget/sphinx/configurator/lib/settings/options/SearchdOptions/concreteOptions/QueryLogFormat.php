<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:05 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class QueryLogFormat
 *
 * query log file format
 * optional, known values are plain and sphinxql, default is plain
 *
 * query_log_format		= sphinxql
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class QueryLogFormat extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}