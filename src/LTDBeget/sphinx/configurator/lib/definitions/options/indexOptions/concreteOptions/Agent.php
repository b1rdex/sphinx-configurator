<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class Agent
 *
 * remote agent
 * multi-value remote agents may be specified
 * syntax for TCP connections is 'hostname:port:index1,[index2[,...]]'
 * syntax for local UNIX connections is '/path/to/socket:index1,[index2[,...]]'
 * agent			= localhost:9313:remote1
 * agent			= localhost:9314:remote2,remote3
 * agent			= /var/run/searchd.sock:remote4
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class Agent extends IndexOption
{
    /**
     * @return bool
     */
    public function isMultiValue() : bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}