<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:32 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class SeamlessRotate
 *
 * seamless rotate, prevents rotate stalls if precaching huge datasets
 * optional, default is 1
 * seamless_rotate		= 1
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class SeamlessRotate extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}