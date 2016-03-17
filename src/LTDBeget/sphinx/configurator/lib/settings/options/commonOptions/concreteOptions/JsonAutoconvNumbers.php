<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 6:50 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\CommonOption;

/**
 * Class JsonAutoconvNumbers
 *
 * whether to auto-convert numeric values from strings in JSON attributes
 * with auto-conversion, string value with actually numeric data
 * (as in {"key":"12345"}) gets stored as a number, rather than string
 * optional, allowed values are 0 and 1, default is 0 (do not convert)
 *
 * json_autoconv_numbers = 1
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\concreteOptions
 */
class JsonAutoconvNumbers extends CommonOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}