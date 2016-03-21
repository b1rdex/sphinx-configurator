<?php
/**
 * @author: Viskov Sergey
 * @date: 3/18/16
 * @time: 5:32 PM
 */

namespace LTDBeget\sphinx\configurator\configurationEntities\sections;


use LTDBeget\sphinx\configurator\configurationEntities\base\Settings;
use LTDBeget\sphinx\configurator\configurationEntities\Option;
use LTDBeget\sphinx\enums\options\eIndexerOption;

/**
 * Class Indexer
 * @package LTDBeget\sphinx\configurator\configurationEntities\base\sections
 */
class Indexer extends Settings
{
    /**
     * @param eIndexerOption $name
     * @param string $value
     * @return Option
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \LTDBeget\sphinx\informer\exceptions\InformerRuntimeException
     */
    public function addOption(eIndexerOption $name, string $value) : Option
    {
        return $this->addOptionInternal($name, $value);
    }
}