<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 7:02 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\CommonOption;

/**
 * Class PluginDir
 *
 * trusted plugin directory
 * optional, default is empty (disable UDFs)
 *
 * plugin_dir			= /usr/local/sphinx/lib
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\concreteOptions
 */
class PluginDir extends CommonOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}