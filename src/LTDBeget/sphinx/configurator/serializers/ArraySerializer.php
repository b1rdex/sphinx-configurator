<?php
/**
 * @author: Viskov Sergey
 * @date: 3/14/16
 * @time: 12:54 PM
 */

namespace LTDBeget\sphinx\configurator\serializers;


use LTDBeget\sphinx\configurator\Configuration;

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
     * @throws \LTDBeget\sphinx\configurator\exceptions\LogicException
     */
    private function serializeSource()
    {
        foreach ($this->objectConfiguration->iterateSource() as $source) {

            $node = [
                "type"        => "source",
                "name"        => $source->getName(),
                "inheritance" => "",
                "options"     => []
            ];

            if ($source->isHasInheritance()) {
                $node["inheritance"] = $source->getInheritance();
            }

            foreach ($source->iterateOptions() as $option) {
                $node["options"][] = [
                    "name"  => $option->getName(),
                    "value" => $option->getValue()
                ];
            }

            $this->arrayConfiguration[] = $node;
        }
    }

    /**
     * @internal
     * @throws \LTDBeget\sphinx\configurator\exceptions\LogicException
     */
    private function serializeIndex()
    {
        foreach ($this->objectConfiguration->iterateIndex() as $index) {
            $node = [
                "type"        => "index",
                "name"        => $index->getName(),
                "inheritance" => "",
                "options"     => []
            ];

            if ($index->isHasInheritance()) {
                $node["inheritance"] = $index->getInheritance();
            }

            foreach ($index->iterateOptions() as $option) {
                $node["options"][] = [
                    "name"  => $option->getName(),
                    "value" => $option->getValue()
                ];
            }

            $this->arrayConfiguration[] = $node;
        }
    }

    /**
     * @internal
     */
    private function serializeIndexer()
    {
        if ($this->objectConfiguration->isHasIndexer()) {
            $node = [
                "type"    => "indexer",
                "options" => []
            ];

            foreach ($this->objectConfiguration->getIndexer()->iterateOptions() as $option) {
                $node["options"][] = [
                    "name"  => $option->getName(),
                    "value" => $option->getValue()
                ];
            }

            $this->arrayConfiguration[] = $node;
        }
    }

    /**
     * @internal
     */
    private function serializeSearchhd()
    {
        if ($this->objectConfiguration->isHasSearchd()) {
            $node = [
                "type"    => "searchd",
                "options" => []
            ];

            foreach ($this->objectConfiguration->getSearchd()->iterateOptions() as $option) {
                $node["options"][] = [
                    "name"  => $option->getName(),
                    "value" => $option->getValue()
                ];
            }

            $this->arrayConfiguration[] = $node;
        }
    }

    /**
     * @internal
     */
    private function serializeCommon()
    {
        if ($this->objectConfiguration->isHasCommon()) {
            $node = [
                "type"    => "common",
                "options" => []
            ];

            foreach ($this->objectConfiguration->getCommon()->iterateOptions() as $option) {
                $node["options"][] = [
                    "name"  => $option->getName(),
                    "value" => $option->getValue()
                ];
            }

            $this->arrayConfiguration[] = $node;
        }
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