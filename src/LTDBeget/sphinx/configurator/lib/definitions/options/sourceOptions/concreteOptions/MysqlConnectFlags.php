<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class MysqlConnectFlags
 *
 * MySQL specific client connection flags
 * optional, default is 0
 *
 * mysql_connect_flags    = 32
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class MysqlConnectFlags extends SourceOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}