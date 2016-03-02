<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:31 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\CommonOption;

/**
 * Class LemmatizerBase
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\concreteOptions
 */
class LemmatizerBase extends CommonOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        // TODO: make dir path check
        return true;
    }
}