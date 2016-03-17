<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class HookPostIndex
 *
 * hook command to run on successful indexing completion
 * $maxid expands to max document ID actually fetched from DB
 * optional, default value is empty (do nothing)
 * 
 * hook_post_index		= bash sql_post_index.sh $maxid
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class HookPostIndex extends SourceOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}