<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:38 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class ListenBacklog
 *
 * socket listen queue length
 * optional, default is 5
 * listen_backlog		= 5
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class ListenBacklog extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}