<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:06 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class MysqlVersionString
 *
 * version string returned to MySQL network protocol clients
 * optional, default is empty (use Sphinx version)
 *
 * mysql_version_string    = 5.0.37
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class MysqlVersionString extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}