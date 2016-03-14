<?php
/**
 * @author: Viskov Sergey
 * @date: 3/14/16
 * @time: 6:36 PM
 */

namespace LTDBeget\sphinxConfigurator\serializers;


use LTDBeget\sphinxConfigurator\SphinxConfiguration;

/**
 * Class JsonSerializer
 * serialize SphinxConfiguration object to json encoded array
 * and json encoded array to SphinxConfiguration object
 * @package LTDBeget\sphinxConfigurator\serializers
 */
final class JsonSerializer
{
    /**
     * Make json encoded content for sphinx configuration file from SphinxConfiguration object
     * @param SphinxConfiguration $configuration
     * @return string
     */
    public static function serialize(SphinxConfiguration $configuration) : string
    {
        return json_encode(ArraySerializer::serialize($configuration));
    }

    /**
     * Make SphinxConfiguration object from json encoded content of sphinx configuration file
     * @param String $configuration
     * @return SphinxConfiguration
     */
    public static function deserialize(string $configuration) : SphinxConfiguration
    {
        return ArraySerializer::deserialize(json_decode($configuration, true));
    }
}