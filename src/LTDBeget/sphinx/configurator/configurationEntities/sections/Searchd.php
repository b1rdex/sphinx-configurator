<?php
/**
 * @author: Viskov Sergey
 * @date  : 3/18/16
 * @time  : 5:43 PM
 */

namespace LTDBeget\sphinx\configurator\configurationEntities\sections;

use LTDBeget\sphinx\configurator\configurationEntities\base\Settings;
use LTDBeget\sphinx\configurator\configurationEntities\Option;
use LTDBeget\sphinx\enums\options\eSearchdOption;

/**
 * Class Searchd
 *
 * @package LTDBeget\sphinx\configurator\configurationEntities\base\sections
 */
class Searchd extends Settings
{
    /**
     * @param eSearchdOption $name
     * @param string $value
     *
     * @return Option
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \LTDBeget\sphinx\informer\exceptions\InformerRuntimeException
     */
    public function addOption(eSearchdOption $name, string $value) : Option
    {
        return $this->addOptionInternal($name, $value);
    }
}