<?php
/**
 * @author: Viskov Sergey
 * @date: 3/14/16
 * @time: 12:54 PM
 */

namespace LTDBeget\sphinx\configurator\serializers;


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\configurator\configurationEntities\base\Definition;
use LTDBeget\sphinx\configurator\configurationEntities\base\Section;
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
    private function __construct()
    {
    }

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
            if($source->isDeleted()) {
                continue;
            }
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
            if($index->isDeleted()) {
                continue;
            }
            $this->serializeDefinition($index);
        }
    }

    /**
     * @internal
     */
    private function serializeIndexer()
    {
        if ($this->objectConfiguration->isHasIndexer() && ! $this->objectConfiguration->getIndexer()->isDeleted()) {
            $this->serializeSettings($this->objectConfiguration->getIndexer());
        }
    }

    /**
     * @internal
     */
    private function serializeSearchhd()
    {
        if ($this->objectConfiguration->isHasSearchd() && ! $this->objectConfiguration->getSearchd()->isDeleted()) {
            $this->serializeSettings($this->objectConfiguration->getSearchd());
        }
    }

    /**
     * @internal
     */
    private function serializeCommon()
    {
        if ($this->objectConfiguration->isHasCommon() && ! $this->objectConfiguration->getCommon()->isDeleted()) {
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
        $this->arrayConfiguration[] = [
            "type"        => (string) $definition->getType(),
            "name"        => (string) $definition->getName(),
            "inheritance" => $definition->isHasInheritance() ? $definition->getInheritance() : null,
            "options"     => $this->serializeOptions($definition)
        ];
    }

    /**
     * @internal
     * @param Settings $settings
     */
    private function serializeSettings(Settings $settings)
    {
        $this->arrayConfiguration[] = [
            "type"    => (string) $settings->getType(),
            "options" => $this->serializeOptions($settings)
        ];
    }

    /**
     * @internal
     * @param Section $section
     * @return array
     */
    private function serializeOptions(Section $section) : array
    {
        $options = [];

        foreach ($section->iterateOptions() as $option) {
            $options[] = [
                "name"  => (string) $option->getName(),
                "value" => $option->getValue()
            ];
        }

        return $options;
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