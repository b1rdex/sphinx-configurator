<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class UnpackMysqlcompress
 *
 * columns to unpack on indexer side when indexing
 * multi-value, optional, default is empty list
 * 
 * unpack_zlib		= zlib_column
 * unpack_mysqlcompress	= compressed_column
 * unpack_mysqlcompress	= compressed_column_2
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class UnpackMysqlcompress extends SourceOption
{
    /**
     * @return bool
     */
    public function isMultiValue() : bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}