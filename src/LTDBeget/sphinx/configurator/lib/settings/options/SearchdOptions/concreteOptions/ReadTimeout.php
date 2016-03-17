<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:27 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class ReadTimeout
 *
 * client read timeout, seconds
 * optional, default is 5
 * read_timeout		= 5
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class ReadTimeout extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}