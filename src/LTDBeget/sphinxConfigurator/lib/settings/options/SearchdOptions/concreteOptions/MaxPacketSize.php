<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:36 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class MaxPacketSize
 *
 * max allowed network packet size
 * limits both query packets from clients, and responses from agents
 * optional, default size is 8M
 * max_packet_size		= 8M
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class MaxPacketSize extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}