<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:00 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;




use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class ThreadStack
 *
 * per-thread stack size, only affects workers=threads mode
 * optional, default is 64K
 *
 * thread_stack			= 128K
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class ThreadStack extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}