<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class Path
 *
 * index files path and file name, without extension
 * mandatory, path must be writable, extensions will be auto-appended
 * path            = /var/lib/sphinxsearch/data/test1
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class Path extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}