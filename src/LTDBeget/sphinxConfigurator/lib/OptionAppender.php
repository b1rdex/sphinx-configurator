<?php
/**
 * @author: Viskov Sergey
 * @date: 3/15/16
 * @time: 9:00 PM
 */

namespace LTDBeget\sphinxConfigurator\lib;


use LTDBeget\sphinxConfigurator\exceptions\NotFoundException;

/**
 * Class OptionAppender
 * @package LTDBeget\sphinxConfigurator\lib
 */
abstract class OptionAppender
{
    /**
     * @param string $methodName
     * @return string
     * @throws NotFoundException
     */
    protected function getOptionClassByMethodName(string $methodName) : string
    {
        $optionName = str_replace("add", "", $methodName);
        $namespace = (new \ReflectionClass(get_called_class()))->getNamespaceName();
        $optionClass = $namespace."\\concreteOptions\\".$optionName;

        if(! class_exists($optionClass)) {
            throw new NotFoundException("Trying to add unknown option {$optionName} to Index definitions");
        }

        return $optionClass;
    }
}