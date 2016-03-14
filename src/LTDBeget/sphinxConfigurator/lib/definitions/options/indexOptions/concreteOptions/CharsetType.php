<?php
/**
 * @author: Viskov Sergey
 * @date: 3/14/16
 * @time: 5:50 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class CharsetType
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions
 */
class CharsetType extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}