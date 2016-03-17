<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class XmlpipeField
 *
 * xmlpipe2 field declaration
 * multi-value, optional, default is empty
 *
 * xmlpipe_field        = subject
 * xmlpipe_field        = content
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class XmlpipeField extends SourceOption
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