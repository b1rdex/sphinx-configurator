<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 6:48 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\CommonOption;

/**
 * Class OnJsonAttrError
 *
 * how to handle syntax errors in JSON attributes
 * known values are 'ignore_attr' and 'fail_index'
 * optional, default is 'ignore_attr'
 *
 * on_json_attr_error = fail_index
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\concreteOptions
 */
class OnJsonAttrError extends CommonOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}