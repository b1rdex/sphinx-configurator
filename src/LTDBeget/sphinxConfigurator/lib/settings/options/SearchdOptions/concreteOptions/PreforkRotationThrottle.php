<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:20 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class PreforkRotationThrottle
 *
 * delay between preforked children restarts on rotation, in milliseconds
 * optional, default is 0 (no delay)
 *
 * prefork_rotation_throttle	= 100
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class PreforkRotationThrottle extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}