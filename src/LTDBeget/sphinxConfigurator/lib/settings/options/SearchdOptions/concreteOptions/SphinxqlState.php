<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:11 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;




use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class SphinxqlState
 *
 * current SphinxQL state (uservars etc) serialization path
 * optional, default is none (do not serialize SphinxQL state)
 *
 * sphinxql_state			= sphinxvars.sql
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class SphinxqlState extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}