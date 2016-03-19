<?php
/**
 * @author: Viskov Sergey
 * @date: 3/18/16
 * @time: 5:32 PM
 */

namespace LTDBeget\sphinx\configurator\configurationEntities\sections;


use LTDBeget\sphinx\configurator\configurationEntities\base\Definition;
use LTDBeget\sphinx\configurator\configurationEntities\Option;
use LTDBeget\sphinx\configurator\exceptions\WrongContextException;
use LTDBeget\sphinx\enums\options\eSourceOption;

/**
 * Class Source
 * @package LTDBeget\sphinx\configurator\configurationEntities\base\sections
 */
class Source extends Definition
{
    /**
     * @param eSourceOption $name
     * @param string $value
     * @return Option
     * @throws WrongContextException
     */
    public function addOption(eSourceOption $name, string $value) : Option
    {
        return $this->addOptionInternal($name, $value);
    }
}