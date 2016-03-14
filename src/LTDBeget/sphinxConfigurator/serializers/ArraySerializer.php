<?php
/**
 * @author: Viskov Sergey
 * @date: 3/14/16
 * @time: 12:54 PM
 */

namespace LTDBeget\sphinxConfigurator\serializers;


use Camel\CaseTransformer;
use Camel\Format\SnakeCase;
use Camel\Format\StudlyCaps;
use LTDBeget\sphinxConfigurator\exceptions\NotFoundException;
use LTDBeget\sphinxConfigurator\exceptions\SerializerException;
use LTDBeget\sphinxConfigurator\SphinxConfiguration;

/**
 * Class ArraySerializer
 * serialize SphinxConfiguration object to array
 * and array to SphinxConfiguration object
 * @package LTDBeget\sphinxConfigurator\serializers
 */
class ArraySerializer
{
    /**
     * @param SphinxConfiguration $configuration
     * @return array
     */
    public static function serialize(SphinxConfiguration $configuration) : array
    {
        $serializer = new self();
        $serializer->objectConfiguration = $configuration;

        return $serializer->serializeInternal();
    }

    /**
     * @param array $configuration
     * @return SphinxConfiguration
     */
    public static function deserialize(array $configuration) : SphinxConfiguration
    {
        $serializer = new self();
        $serializer->arrayConfiguration = $configuration;
        $serializer->objectConfiguration = new SphinxConfiguration();

        return $serializer->deserializeInternal();
    }

    private function __construct(){}

    private function serializeInternal() : array
    {
        $this->serializeSource();
        $this->serializeIndex();
        $this->serializeIndexer();
        $this->serializeSearchhd();
        $this->serializeCommon();

        return $this->arrayConfiguration;
    }

    private function serializeSource()
    {
        foreach($this->objectConfiguration->iterateSource() as $source) {

            $node = [
                "type"        => "source",
                "name"        => $source->getName(),
                "inheritance" => "",
                "options"     => []
            ];

            if($source->isHasInheritance()) {
                $node["inheritance"] = $source->getInheritanceName();
            }

            foreach($source->iterateOptions() as $option) {
                $node["options"][] = [
                    "name"  => $option->getName(),
                    "value" => $option->getValue()
                ];
            }

            $this->arrayConfiguration[] = $node;
        }
    }

    private function serializeIndex()
    {
        foreach($this->objectConfiguration->iterateIndex() as $index) {
            $node = [
                "type"        => "index",
                "name"        => $index->getName(),
                "inheritance" => "",
                "options"     => []
            ];

            if($index->isHasInheritance()) {
                $node["inheritance"] = $index->getInheritanceName();
            }

            foreach($index->iterateOptions() as $option) {
                $node["options"][] = [
                    "name"  => $option->getName(),
                    "value" => $option->getValue()
                ];
            }

            $this->arrayConfiguration[] = $node;
        }
    }

    private function serializeIndexer()
    {
        if($this->objectConfiguration->isHasIndexer()) {
            $node = [
                "type"        => "indexer",
                "options"     => []
            ];

            foreach($this->objectConfiguration->getIndexer()->iterateOptions() as $option) {
                $node["options"][] = [
                    "name"  => $option->getName(),
                    "value" => $option->getValue()
                ];
            }

            $this->arrayConfiguration[] = $node;
        }
    }

    private function serializeSearchhd()
    {
        if($this->objectConfiguration->isHasSearchd()) {
            $node = [
                "type"        => "searchd",
                "options"     => []
            ];

            foreach($this->objectConfiguration->getSearchd()->iterateOptions() as $option) {
                $node["options"][] = [
                    "name"  => $option->getName(),
                    "value" => $option->getValue()
                ];
            }

            $this->arrayConfiguration[] = $node;
        }
    }

    private function serializeCommon()
    {
        if($this->objectConfiguration->isHasCommon()) {
            $node = [
                "type"        => "common",
                "options"     => []
            ];

            foreach($this->objectConfiguration->getCommon()->iterateOptions() as $option) {
                $node["options"][] = [
                    "name"  => $option->getName(),
                    "value" => $option->getValue()
                ];
            }

            $this->arrayConfiguration[] = $node;
        }
    }

    private function deserializeInternal() : SphinxConfiguration
    {
        foreach($this->arrayConfiguration as $node) {

            if(!array_key_exists("type", $node)) {
                throw new SerializerException("Wrong array format. All nodes must contain type.");
            }

            switch($node["type"]) {
                case "source":

                    if(!array_key_exists("name", $node)) {
                        throw new SerializerException("Wrong array format. All source nodes must contain name.");
                    }

                    $name = $node["name"];
                    $inheritanceName = !empty($node["inheritance"]) ? $node["inheritance"] : null;
                    $nodeObject = $this->objectConfiguration->addSource($name, $inheritanceName);
                    break;
                case "index":
                    $name = $node["name"];

                    if(!array_key_exists("name", $node)) {
                        throw new SerializerException("Wrong array format. All index nodes must contain name.");
                    }

                    $inheritanceName = !empty($node["inheritance"]) ? $node["inheritance"] : null;
                    $nodeObject = $this->objectConfiguration->addIndex($name, $inheritanceName);
                    break;
                case "indexer":
                    $nodeObject = $this->objectConfiguration->getIndexer();
                    break;
                case "searchd":
                    $nodeObject = $this->objectConfiguration->getSearchd();
                    break;
                case "common":
                    $nodeObject = $this->objectConfiguration->getCommon();
                    break;
                default:
                    throw new SerializerException("Unknown node type {$node["type"]}");
                    break;
            }

            if(!array_key_exists("options", $node)) {
                continue;
            }

            foreach($node["options"] as $option) {

                if(!array_key_exists("name", $option)) {
                    throw new SerializerException("Wrong array format. All options must contain name.");
                }

                if(!array_key_exists("value", $option)) {
                    throw new SerializerException("Wrong array format. All options must contain value.");
                }

                $optionName = $option["name"];
                $optionValue = $option["value"];

                $optionClassName = (new CaseTransformer(new SnakeCase(), new StudlyCaps()))->transform($optionName);
                $appenderMethodName = "add".$optionClassName;
                try {
                    $nodeObject->getOptionAppender()->$appenderMethodName($optionValue);
                } catch(NotFoundException $e) {
                    throw new SerializerException($e->getMessage(), 0, $e);
                }
            }
        }

        return $this->objectConfiguration;
    }

    /**
     * @var array
     */
    private $arrayConfiguration = [];

    /**
     * @var SphinxConfiguration
     */
    private $objectConfiguration = null;
}