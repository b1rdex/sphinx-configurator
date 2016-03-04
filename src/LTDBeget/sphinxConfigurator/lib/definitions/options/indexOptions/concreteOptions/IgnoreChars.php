<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class IgnoreChars
 *
 * ignored characters list
 * optional, default value is empty
 * 
 * ignore_chars		= U+00AD
 *
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions
 */
class IgnoreChars extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}