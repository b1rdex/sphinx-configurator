<?php
/**
 * @author: Viskov Sergey
 * @date: 19.03.16
 * @time: 2:00
 */

namespace LTDBeget\sphinx\configurator\deserializers;


use LTDBeget\sphinx\configurator\Configuration;

/**
 * Class JsonDeserializer
 * Deserialize json encoded array to Configuration object
 * @package LTDBeget\sphinx\configurator\deserializers
 */
final class JsonDeserializer
{
    /**
     * @internal
     * ArrayDeserializer constructor.
     */
    private function __construct()
    {
    }

    /**
     * Make Configuration object from json encoded content of sphinx configuration file
     * @param string $jsonConfiguration
     * @param Configuration $objectConfiguration
     * @return Configuration
     */
    public static function deserialize(string $jsonConfiguration, Configuration $objectConfiguration) : Configuration
    {
        return ArrayDeserializer::deserialize(json_decode($jsonConfiguration, true), $objectConfiguration);
    }
}