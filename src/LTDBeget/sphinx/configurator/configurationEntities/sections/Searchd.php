<?php
/**
 * @author: Viskov Sergey
 * @date: 3/18/16
 * @time: 5:43 PM
 */

namespace LTDBeget\sphinx\configurator\configurationEntities\sections;


use LTDBeget\sphinx\configurator\exceptions\WrongContextException;
use LTDBeget\sphinx\configurator\configurationEntities\Option;
use LTDBeget\sphinx\configurator\configurationEntities\base\Section;
use LTDBeget\sphinx\enums\options\eSearchdOption;

/**
 * Class Searchd
 * @package LTDBeget\sphinx\configurator\configurationEntities\base\sections
 */
class Searchd extends Section
{
    /**
     * @param eSearchdOption $name
     * @param string $value
     * @return Option
     * @throws WrongContextException
     */
    public function addOption(eSearchdOption $name, string $value) : Option
    {
        return $this->addOptionInternal($name, $value);
    }
}