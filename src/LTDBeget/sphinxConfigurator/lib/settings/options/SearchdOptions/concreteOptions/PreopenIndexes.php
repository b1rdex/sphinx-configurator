<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:33 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class PreopenIndexes
 *
 * whether to forcibly preopen all indexes on startup
 * optional, default is 1 (preopen everything)
 * preopen_indexes		= 1
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class PreopenIndexes extends SearchdOption
{

    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}