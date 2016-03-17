<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class AgentPersistent
 *
 * persistenly connected remote agent
 * reduces connect() pressure, requires that workers IS threads
 *
 * agent_persistent        = testbox:9312:testindex1,testindex2
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class AgentPersistent extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}