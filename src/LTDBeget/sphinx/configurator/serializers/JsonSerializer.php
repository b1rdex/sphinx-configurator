<?php
/**
 * @author: Viskov Sergey
 * @date: 3/14/16
 * @time: 6:36 PM
 */

namespace LTDBeget\sphinx\configurator\serializers;


use LTDBeget\sphinx\configurator\Configuration;

/**
 * Class JsonSerializer
 * serialize Configuration object to json encoded array
 * and json encoded array to Configuration object
 * @package LTDBeget\sphinx\configurator\serializers
 */
final class JsonSerializer
{
    /**
     * Make json encoded content for sphinx configuration file from Configuration object
     * @param Configuration $configuration
     * @return string
     */
    public static function serialize(Configuration $configuration) : string
    {
        return json_encode(ArraySerializer::serialize($configuration));
    }

    /**
     * Make Configuration object from json encoded content of sphinx configuration file
     * @param String $configuration
     * @return Configuration
     */
    public static function deserialize(string $configuration) : Configuration
    {
        return ArraySerializer::deserialize(json_decode($configuration, true));
    }
}