<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 6:22 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class Type
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