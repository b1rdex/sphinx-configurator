<?php
/**
 * @author: Viskov Sergey
 * @date: 3/14/16
 * @time: 12:54 PM
 */

namespace LTDBeget\sphinx\configurator\serializers;


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\configurator\configurationEntities\base\Definition;
use LTDBeget\sphinx\configurator\configurationEntities\base\Settings;
use LTDBeget\sphinx\configurator\exceptions\LogicException;

/**
 * Class ArraySerializer
 * serialize Configuration object to array
 * @package LTDBeget\sphinx\configurator\serializers
 */
class ArraySerializer
{
    /**
     * Make array represent of Configuration object
     * @param Configuration $configuration
     * @return array
     */
    public static function serialize(Configuration $configuration) : array
    {
        $serializer                      = new self();
        $serializer->objectConfiguration = $configuration;

        return $serializer->serializeInternal();
    }

    /**
     * @internal
     * ArraySerializer constructor.
     */
    private function __construct() {}

    /**
     * @internal
     * @return array
     */
    private function serializeInternal() : array
    {
        $this->serializeSource();
        $this->serializeIndex();
        $this->serializeIndexer();
        $this->serializeSearchhd();
        $this->serializeCommon();

        return $this->arrayConfiguration;
    }

    /**
     * @internal
     * @throws LogicException
     */
    private function serializeSource()
    {
        foreach ($this->objectConfiguration->iterateSource() as $source) {
            $this->serializeDefinition($source);
        }
    }

    /**
     * @internal
     * @throws LogicException
     */
    private function serializeIndex()
    {
        foreach ($this->objectConfiguration->iterateIndex() as $index) {
            $this->serializeDefinition($index);
        }
    }

    /**
     * @internal
     */
    private function serializeIndexer()
    {
        if ($this->objectConfiguration->isHasIndexer()) {
            $this->serializeSettings($this->objectConfiguration->getIndexer());
        }
    }

    /**
     * @internal
     */
    private function serializeSearchhd()
    {
        if ($this->objectConfiguration->isHasSearchd()) {
            $this->serializeSettings($this->objectConfiguration->getSearchd());
        }
    }

    /**
     * @internal
     */
    private function serializeCommon()
    {
        if ($this->objectConfiguration->isHasCommon()) {
            $this->serializeSettings($this->objectConfiguration->getCommon());
        }
    }

    /**
     * @internal
     * @param Definition $definition
     * @throws LogicException
     */
    private function serializeDefinition(Definition $definition)
    {
        $node = [
            "type"        => "source",
            "name"        => $definition->getName(),
            "inheritance" => "",
            "options"     => []
        ];

        if ($definition->isHasInheritance()) {
            $node["inheritance"] = $definition->getInheritance();
        }

        foreach ($definition->iterateOptions() as $option) {
            $node["options"][] = [
                "name"  => $option->getName(),
                "value" => $option->getValue()
            ];
        }

        $this->arrayConfiguration[] = $node;
    }

    /**
     * @internal
     * @param Settings $settings
     */
    private function serializeSettings(Settings $settings)
    {
        $node = [
            "type"    => (string) $settings->getType(),
            "options" => []
        ];

        foreach ($settings->iterateOptions() as $option) {
            $node["options"][] = [
                "name"  => $option->getName(),
                "value" => $option->getValue()
            ];
        }

        $this->arrayConfiguration[] = $node;
    }

    /**
     * @var array
     */
    private $arrayConfiguration = [];

    /**
     * @var Configuration
     */
    private $objectConfiguration = null;
}