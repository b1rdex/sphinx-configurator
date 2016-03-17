<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 6:53 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\CommonOption;

/**
 * Class JsonAutoconvKeynames
 *
 * whether and how to auto-convert key names in JSON attributes
 * known value is 'lowercase'
 * optional, default is unspecified (do nothing)
 *
 * json_autoconv_keynames = lowercase
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\concreteOptions
 */
class JsonAutoconvKeynames extends CommonOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}