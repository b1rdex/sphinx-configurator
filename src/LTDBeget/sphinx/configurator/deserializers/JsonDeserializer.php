<?php
/**
 * @author: Viskov Sergey
 * @date  : 19.03.16
 * @time  : 2:00
 */

namespace LTDBeget\sphinx\configurator\deserializers;

use LTDBeget\sphinx\configurator\Configuration;

/**
 * Class JsonDeserializer
 * Deserialize json encoded array to Configuration object
 *
 * @package LTDBeget\sphinx\configurator\deserializers
 */
final class JsonDeserializer
{
    /**
     * Make Configuration object from json encoded content of sphinx configuration file
     *
     * @param string $jsonConfiguration
     * @param Configuration $objectConfiguration
     *
     * @return Configuration
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \BadMethodCallException
     * @throws \LTDBeget\sphinx\configurator\exceptions\ConfigurationException
     * @throws \LTDBeget\sphinx\configurator\exceptions\DeserializeException
     */
    public static function deserialize(string $jsonConfiguration, Configuration $objectConfiguration) : Configuration
    {
        return ArrayDeserializer::deserialize(json_decode($jsonConfiguration, true), $objectConfiguration);
    }
}