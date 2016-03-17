<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:29 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class PersistentConnectionsLimit
 *
 * maximum amount of persistent connections from this master to each agent host
 * optional, but necessary if you use agent_persistent. It is reasonable to set the value
 * as max_children, or less on the agent's hosts.
 * persistent_connections_limit	= 30
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class PersistentConnectionsLimit extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}