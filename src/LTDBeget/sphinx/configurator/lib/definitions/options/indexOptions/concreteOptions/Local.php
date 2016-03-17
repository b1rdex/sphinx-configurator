<?php
/**
 * @author: Viskov Sergey
 * @date: 3/14/16
 * @time: 6:48 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class Local
 * local index to be searched
 * there can be many local indexes configured
 * local            = test1
 * local            = test1stemmed
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class Local extends IndexOption
{
    /**
     * @return bool
     */
    public function isMultiValue() : bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}