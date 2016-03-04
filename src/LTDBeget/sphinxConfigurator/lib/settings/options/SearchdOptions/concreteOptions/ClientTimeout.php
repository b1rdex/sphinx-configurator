<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:28 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class ClientTimeout
 *
 * request timeout, seconds
 * optional, default is 5 minutes
 * client_timeout		= 300
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class ClientTimeout extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}