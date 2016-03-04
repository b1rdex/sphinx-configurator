<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:34 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class AttrFlushPeriod
 *
 * attribute updates periodic flush timeout, seconds
 * updates will be automatically dumped to disk this frequently
 * optional, default is 0 (disable periodic flush)
 *
 * attr_flush_period	= 900
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class AttrFlushPeriod extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}