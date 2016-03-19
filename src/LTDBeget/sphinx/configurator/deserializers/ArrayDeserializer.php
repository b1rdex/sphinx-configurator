<?php
/**
 * @author: Viskov Sergey
 * @date: 19.03.16
 * @time: 1:54
 */

namespace LTDBeget\sphinx\configurator\deserializers;


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\configurator\configurationEntities\base\Section;
use LTDBeget\sphinx\configurator\exceptions\SerializerException;
use LTDBeget\sphinx\enums\base\eOption;
use LTDBeget\sphinx\enums\eSection;
use LTDBeget\sphinx\enums\options\eCommonOption;
use LTDBeget\sphinx\enums\options\eIndexerOption;
use LTDBeget\sphinx\enums\options\eIndexOption;
use LTDBeget\sphinx\enums\options\eSearchdOption;
use LTDBeget\sphinx\enums\options\eSourceOption;

/**
 * Class ArrayDeserializer
 * Serialize correct array to Configuration object
 * @package LTDBeget\sphinx\configurator\deserializers
 */
final class ArrayDeserializer
{
    /**
     * Make Configuration object from array serialized content of sphinx configuration file
     * @param array $arrayConfiguration
     * @param Configuration $objectConfiguration
     * @return Configuration
     * @throws SerializerException
     */
    public static function deserialize(array $arrayConfiguration, Configuration $objectConfiguration) : Configuration
    {
        $serializer                      = new self();
        $serializer->arrayConfiguration  = $arrayConfiguration;
        $serializer->objectConfiguration = $objectConfiguration;

        return $serializer->deserializeInternal();
    }

    /**
     * @internal
     * ArrayDeserializer constructor.
     */
    private function __construct() {}

    /**
     * @internal
     * @return Configuration
     * @throws SerializerException
     */
    private function deserializeInternal() : Configuration
    {
        foreach ($this->arrayConfiguration as $section) {
            $sectionObject = $this->deserializeSection($section);

            if (!array_key_exists("options", $section)) {
                continue;
            }

            $this->deserializeOptions($section["options"], $sectionObject);
        }

        return $this->objectConfiguration;
    }

    /**
     * @internal
     * @param array $section
     * @return Section
     * @throws SerializerException
     */
    private function deserializeSection(array $section) : Section
    {
        if (!array_key_exists("type", $section)) {
            throw new SerializerException("Wrong array format. All sections must contain type.");
        }

        switch($section["type"]) {
            case eSection::INDEXER():
                $section =  $this->objectConfiguration->getIndexer();
                break;
            case eSection::SEARCHD():
                $section =  $this->objectConfiguration->getSearchd();
                break;
            case eSection::COMMON():
                $section =  $this->objectConfiguration->getCommon();
                break;
            case eSection::SOURCE():
            case eSection::INDEX():
                if (!array_key_exists("name", $section)) {
                    throw new SerializerException("Wrong array format. All source nodes must contain name.");
                }

                $name            = $section["name"];
                $inheritanceName = !empty($section["inheritance"]) ? $section["inheritance"] : null;

                if($section["type"] == eSection::SOURCE()) {
                    $section = $this->objectConfiguration->addSource($name, $inheritanceName);
                } else {
                    $section = $this->objectConfiguration->addIndex($name, $inheritanceName);
                }
                break;
            default:
                throw new SerializerException("Unknown section type {$section["type"]}");
        }

        return $section;
    }

    /**
     * @internal
     * @param array $options
     * @param Section $section
     * @throws SerializerException
     */
    private function deserializeOptions(array $options, Section $section)
    {
        foreach ($options as $option) {

            if (!array_key_exists("name", $option)) {
                throw new SerializerException("Wrong array format. All options must contain name.");
            }

            if (!array_key_exists("value", $option)) {
                throw new SerializerException("Wrong array format. All options must contain value.");
            }

            $optionName  = $option["name"];
            $optionValue = $option["value"];

            try {
                $section->addOption($this->getOptionName($section, $optionName), $optionValue);
            } catch (\Exception $e) {
                throw new SerializerException($e->getMessage(), 0, $e);
            }
        }
    }

    /**
     * @internal
     * @param Section $section
     * @param string $name
     * @return eOption
     * @throws SerializerException
     */
    private function getOptionName(Section $section, string $name) : eOption
    {
        switch($section->getType()) {
            case eSection::SOURCE():
                $option = eSourceOption::get($name);
                break;
            case eSection::INDEX():
                $option = eIndexOption::get($name);
                break;
            case eSection::INDEXER():
                $option = eIndexerOption::get($name);
                break;
            case eSection::SEARCHD():
                $option = eSearchdOption::get($name);
                break;
            case eSection::COMMON():
                $option = eCommonOption::get($name);
                break;
            default:
                throw new SerializerException("Unknown section type {$section->getType()}");
        }

        return $option;
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