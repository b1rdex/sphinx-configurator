<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:33 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;




use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class UnlinkOld
 *
 * whether to unlink .old index copies on successful rotation.
 * optional, default is 1 (do unlink)
 * unlink_old		= 1
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class UnlinkOld extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}