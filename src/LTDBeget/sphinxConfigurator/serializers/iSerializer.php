<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 5:04 PM
 */

namespace LTDBeget\sphinxConfigurator\serializers;


use LTDBeget\sphinxConfigurator\SphinxConfiguration;

/**
 * Interface iSerializer
 * @package LTDBeget\sphinxConfigurator\serializers
 */
interface iSerializer
{
    /**
     * @param SphinxConfiguration $configuration
     * @return string
     */
    public static function serialize(SphinxConfiguration $configuration) : string ;

    /**
     * @param String $configuration
     * @return SphinxConfiguration
     */
    public static function deserialize(string $configuration) : SphinxConfiguration;
}