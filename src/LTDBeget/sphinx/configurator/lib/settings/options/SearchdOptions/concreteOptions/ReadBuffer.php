<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:39 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class ReadBuffer
 *
 * per-keyword read buffer size
 * optional, default is 256K
 * read_buffer		= 256K
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class ReadBuffer extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}