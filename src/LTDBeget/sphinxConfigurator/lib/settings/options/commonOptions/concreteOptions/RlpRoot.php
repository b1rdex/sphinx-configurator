<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 6:56 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\CommonOption;

/**
 * Class RlpRoot
 *
 * path to RLP root directory
 * optional, default is /usr/local/share (see ./configure --datadir)
 *
 * rlp_root = /usr/local/share/sphinx/rlp
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\concreteOptions
 */
class RlpRoot extends CommonOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}