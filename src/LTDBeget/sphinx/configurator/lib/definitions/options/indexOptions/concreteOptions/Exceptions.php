<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class Exceptions
 *
 * tokenizing exceptions file
 * optional, default is empty
 *
 * plain text, case sensitive, space insensitive in map-from part
 * one "Map Several Words => ToASingleOne" entry per line
 *
 * exceptions        = /var/lib/sphinxsearch/data/exceptions.txt
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class Exceptions extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}