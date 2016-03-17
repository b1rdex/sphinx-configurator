<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:35 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class MvaUpdatesPool
 *
 * MVA updates pool size
 * shared between all instances of searchd, disables attr flushes!
 * optional, default size is 1M
 * mva_updates_pool	= 1M
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class MvaUpdatesPool extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}