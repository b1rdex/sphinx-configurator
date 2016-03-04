<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:28 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class MaxChildren
 *
 * maximum amount of children to fork (concurrent searches to run)
 * optional, default is 0 (unlimited)
 * max_children		= 30
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class MaxChildren extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}