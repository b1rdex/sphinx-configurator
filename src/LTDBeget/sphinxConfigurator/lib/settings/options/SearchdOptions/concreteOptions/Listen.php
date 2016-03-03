<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 12:29 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class Listen
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class Listen extends SearchdOption
{

    /**
     * [hostname:]port[:protocol], or /unix/socket/path to listen on
     * known protocols are 'sphinx' (SphinxAPI) and 'mysql41' (SphinxQL)
     *
     * multi-value, multiple listen points are allowed
     * optional, defaults are 9312:sphinx and 9306:mysql41, as below
     *
     * listen			= 127.0.0.1
     * listen			= 192.168.0.1:9312
     * listen			= 9312
     * listen			= /var/run/searchd.sock
     *
     * @return bool
     */
    public function validate() : bool
    {
        return true;
        //
        // TODO: Implement validate() method.
    }
}