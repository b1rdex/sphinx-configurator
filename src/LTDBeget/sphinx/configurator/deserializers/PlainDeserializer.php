<?php
/**
 * @author: Viskov Sergey
 * @date: 19.03.16
 * @time: 2:00
 */

namespace LTDBeget\sphinx\configurator\deserializers;


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\Tokenizer;


/**
 * Class PlainDeserializer
 * @package LTDBeget\sphinx\configurator\deserializers
 */
final class PlainDeserializer
{
    /**
     * Make Configuration object from plain content of sphinx configuration file
     * @param string $stringConfiguration
     * @param Configuration $objectConfiguration
     * @return Configuration
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \LTDBeget\sphinx\configurator\exceptions\ConfigurationException
     * @throws \LTDBeget\sphinx\configurator\exceptions\DeserializeException
     * @throws \BadMethodCallException
     * @throws \LTDBeget\sphinx\SyntaxErrorException
     */
    public static function deserialize(string $stringConfiguration, Configuration $objectConfiguration) : Configuration
    {
        return ArrayDeserializer::deserialize(Tokenizer::tokenize($stringConfiguration), $objectConfiguration);
    }
}