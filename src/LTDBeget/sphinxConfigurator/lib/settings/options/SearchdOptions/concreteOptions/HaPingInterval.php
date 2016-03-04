<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:16 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class HaPingInterval
 *
 * interval between agent mirror pings, in milliseconds
 * 0 means disable pings
 * optional, default is 1000
 *
 * ha_ping_interval		= 0
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class HaPingInterval extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}