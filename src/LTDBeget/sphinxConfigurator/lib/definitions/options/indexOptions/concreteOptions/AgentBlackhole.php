<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class AgentBlackhole
 *
 * blackhole remote agent, for debugging/testing
 * network errors and search results will be ignored
 * 
 * agent_blackhole		= testbox:9312:testindex1,testindex2
 *
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions
 */
class AgentBlackhole extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}