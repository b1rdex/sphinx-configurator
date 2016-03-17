<?php
/**
 * @author: Viskov Sergey
 * @date: 3/14/16
 * @time: 5:03 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class SqlPort
 *
 * some straightforward parameters for SQL source types
 * sql_host        = localhost
 * sql_user        = test
 * sql_pass        =
 * sql_db        = test
 * sql_port        = 3306    # optional, default is 3306
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class SqlPort extends SourceOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}