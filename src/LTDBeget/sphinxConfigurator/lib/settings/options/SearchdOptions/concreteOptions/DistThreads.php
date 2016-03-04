<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:53 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class DistThreads
 *
 * max threads to create for searching local parts of a distributed index
 * optional, default is 0, which means disable multi-threaded searching
 * should work with all MPMs (ie. does NOT require workers=threads)
 *
 * dist_threads		= 4
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class DistThreads extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}