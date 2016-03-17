<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class GlobalIdf
 *
 * path to a global (cluster-wide) keyword IDFs file
 * optional, default is empty (use local IDFs)
 *
 * global_idf        = /usr/local/sphinx/var/global.idf
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class GlobalIdf extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}