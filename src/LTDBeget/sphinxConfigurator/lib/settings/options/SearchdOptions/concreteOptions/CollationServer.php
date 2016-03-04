<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:07 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class CollationServer
 *
 * default server-wide collation
 * optional, default is libc_ci
 *
 * collation_server		= utf8_general_ci
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class CollationServer extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}