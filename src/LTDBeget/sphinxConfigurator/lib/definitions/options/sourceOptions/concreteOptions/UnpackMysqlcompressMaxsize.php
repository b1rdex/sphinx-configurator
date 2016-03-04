<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class UnpackMysqlcompressMaxsize
 *
 * maximum unpacked length allowed in MySQL COMPRESS() unpacker
 * optional, default is 16M
 * 
 * unpack_mysqlcompress_maxsize	= 16M
 *
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class UnpackMysqlcompressMaxsize extends SourceOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}