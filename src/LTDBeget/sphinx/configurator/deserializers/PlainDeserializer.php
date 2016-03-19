<?php
/**
 * @author: Viskov Sergey
 * @date: 19.03.16
 * @time: 2:00
 */

namespace LTDBeget\sphinx\configurator\deserializers;


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\configurator\parser\SphinxConfigurationParser;

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
     */
    public static function deserialize(string $stringConfiguration, Configuration $objectConfiguration) : Configuration
    {
        return ArrayDeserializer::deserialize(SphinxConfigurationParser::parse($stringConfiguration), $objectConfiguration);
    }

    /**
     * @internal
     * ArrayDeserializer constructor.
     */
    private function __construct()
    {
    }
}