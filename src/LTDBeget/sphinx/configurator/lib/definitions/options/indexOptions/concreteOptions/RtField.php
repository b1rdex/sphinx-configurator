<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class RtField
 *
 * full-text field declaration
 * multi-value, mandatory
 * rt_field        = title
 * rt_field        = content
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class RtField extends IndexOption
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