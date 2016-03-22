<?php
/**
 * @author: Viskov Sergey
 * @date: 19.03.16
 * @time: 1:54
 */

namespace LTDBeget\sphinx\configurator\deserializers;


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\configurator\configurationEntities\base\Section;
use LTDBeget\sphinx\configurator\exceptions\DeserializeException;
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
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @throws \InvalidArgumentException
     * @throws \LogicException
     * @throws \BadMethodCallException
     * @throws \LTDBeget\sphinx\configurator\exceptions\ConfigurationException
     * @throws \LTDBeget\sphinx\configurator\exceptions\DeserializeException
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
    private function __construct()
    {
    }

    /**
     * @internal
     * @return Configuration
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \BadMethodCallException
     * @throws \LTDBeget\sphinx\configurator\exceptions\ConfigurationException
     * @throws \LTDBeget\sphinx\configurator\exceptions\DeserializeException
     */
    private function deserializeInternal() : Configuration
    {
        foreach ($this->arrayConfiguration as $section) {
            $sectionObject = $this->deserializeSection($section);

            if (!array_key_exists('options', $section)) {
                continue;
            }

            $this->deserializeOptions($section['options'], $sectionObject);
        }

        return $this->objectConfiguration;
    }

    /**
     * @internal
     * @param array $section_data
     * @return Section
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @throws \LogicException
     * @throws \LTDBeget\sphinx\configurator\exceptions\DeserializeException
     * @throws \InvalidArgumentException
     * @throws \BadMethodCallException
     * @throws \LTDBeget\sphinx\configurator\exceptions\ConfigurationException
     */
    private function deserializeSection(array $section_data) : Section
    {
        $type        = $section_data['type'] ?? null;
        $name        = $section_data['name'] ?? null;
        $inheritance = $section_data['inheritance'] ?? null;

        switch ($type) {
            case eSection::INDEXER:
                $section = $this->objectConfiguration->getIndexer();
                break;
            case eSection::SEARCHD:
                $section = $this->objectConfiguration->getSearchd();
                break;
            case eSection::COMMON:
                $section = $this->objectConfiguration->getCommon();
                break;
            case eSection::SOURCE:
                $section = $this->objectConfiguration->addSource($name, $inheritance);
                break;
            case eSection::INDEX:
                $section = $this->objectConfiguration->addIndex($name, $inheritance);
                break;
            default:
                throw new DeserializeException('Unknown section type');
        }

        return $section;
    }

    /**
     * @internal
     * @param array $options
     * @param Section $section
     * @throws \LTDBeget\sphinx\configurator\exceptions\DeserializeException
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    private function deserializeOptions(array $options, Section $section)
    {
        foreach ($options as $option) {

            if (!array_key_exists('name', $option)) {
                throw new DeserializeException('Wrong array format. All options must contain name.');
            }

            if (!array_key_exists('value', $option)) {
                throw new DeserializeException('Wrong array format. All options must contain value.');
            }

            $optionName  = $option['name'];
            $optionValue = $option['value'];
            $this->deserializeOption($section, $optionName, $optionValue);
        }
    }

    /**
     * @param Section $section
     * @param $optionName
     * @param $optionValue
     * @throws \InvalidArgumentException
     * @throws \LogicException
     * @throws \LTDBeget\sphinx\configurator\exceptions\DeserializeException
     */
    private function deserializeOption(Section $section, $optionName, $optionValue)
    {
        $sectionType = $section->getType();
        $informer = $section->getConfiguration()->getInformer();
        $optionName = $this->getOptionName($section, $optionName);

        if($informer->isKnownOption($sectionType, $optionName)) {
            $section->addOption($optionName, $optionValue);
        } elseif($informer->isRemovedOption($sectionType, $optionName)) {
            return;
        } else {
            throw new DeserializeException("Unknown option name {$optionName} in section {$section->getType()}");
        }
    }

    /**
     * @internal
     * @param Section $section
     * @param string $name
     * @return eOption
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \LTDBeget\sphinx\configurator\exceptions\DeserializeException
     */
    private function getOptionName(Section $section, string $name) : eOption
    {
        switch ($section->getType()) {
            case eSection::SOURCE:
                $option = eSourceOption::get($name);
                break;
            case eSection::INDEX:
                $option = eIndexOption::get($name);
                break;
            case eSection::INDEXER:
                $option = eIndexerOption::get($name);
                break;
            case eSection::SEARCHD:
                $option = eSearchdOption::get($name);
                break;
            case eSection::COMMON:
                $option = eCommonOption::get($name);
                break;
            default:
                throw new DeserializeException("Unknown section type {$section->getType()}");
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
    private $objectConfiguration;
}