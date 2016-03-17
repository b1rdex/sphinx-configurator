<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:52 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;




use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class Workers
 *
 * multi-processing mode (MPM)
 * known values are none, fork, prefork, and threads
 * threads is required for RT backend to work
 * optional, default is threads
 * workers			= threads # for RT to work
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class Workers extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}