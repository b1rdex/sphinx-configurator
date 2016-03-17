<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 12:41 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class ReadUnhinted
 *
 * unhinted read size (currently used when reading hits)
 * optional, default is 32K
 * read_unhinted        = 32K
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class ReadUnhinted extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}