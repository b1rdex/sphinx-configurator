<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class Type
 *
 * data source type. mandatory, no default value
 * known types are mysql, pgsql, mssql, xmlpipe, xmlpipe2, odbc
 *
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class Type extends SourceOption
{
    /**
     * @var array
     */
    private $knownTypes = [
        "mysql",
        "pgsql",
        "mssql",
        "xmlpipe",
        "xmlpipe2",
        "odbc"
    ];

    /**
     * @return bool
     */
    public function validate() : bool
    {
        return in_array($this->getValue(), $this->knownTypes);
    }
}