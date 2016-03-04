<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class SqlSock
 *
 * UNIX socket name
 * optional, default is empty (reuse client library defaults)
 * usually '/var/lib/mysql/mysql.sock' on Linux
 * usually '/tmp/mysql.sock' on FreeBSD
 * 
 * sql_sock		= /tmp/mysql.sock
 *
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class SqlSock extends SourceOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}