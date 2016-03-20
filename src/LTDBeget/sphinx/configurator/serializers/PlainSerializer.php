<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 5:13 PM
 */

namespace LTDBeget\sphinx\configurator\serializers;


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\configurator\configurationEntities\base\Section;

/**
 * Class PlainSerializer
 * serialize Configuration object to string for file .conf
 * @package LTDBeget\sphinx\configurator\serializers
 */
final class PlainSerializer
{
    /**
     * Make plain content for sphinx configuration file from Configuration object
     * @param Configuration $configuration
     * @return string
     */
    public static function serialize(Configuration $configuration) : string
    {
        $serializer         = new self();
        $serializer->object = $configuration;

        return $serializer->serializeInternal();
    }

    /**
     * @internal
     * @return string
     */
    public function serializeInternal() : string
    {
        $this->serializeSources();
        $this->serializeIndexes();
        $this->serializeIndexer();
        $this->serializeSearchd();
        $this->serializeCommon();

        return $this->string;
    }

    /**
     * @internal
     */
    private function serializeSources()
    {
        foreach ($this->object->iterateSource() as $source) {
            $this->serializeSection($source);
        }
    }

    /**
     * @internal
     */
    private function serializeIndexes()
    {
        foreach ($this->object->iterateIndex() as $index) {
            $this->serializeSection($index);
        }
    }

    /**
     * @internal
     */
    private function serializeIndexer()
    {
        if ($this->object->isHasIndexer()) {
            $this->serializeSection($this->object->getIndexer());
        }
    }

    /**
     * @internal
     */
    private function serializeSearchd()
    {
        if ($this->object->isHasSearchd()) {
            $this->serializeSection($this->object->getSearchd());
        }
    }

    /**
     * @internal
     */
    private function serializeCommon()
    {
        if ($this->object->isHasCommon()) {
            $this->serializeSection($this->object->getCommon());
        }
    }

    /**
     * @internal
     * @param Section $section
     */
    private function serializeSection(Section $section)
    {
        if($section->isDeleted()) {
            return;
        }

        $this->string .= "{$section}" . PHP_EOL;
        $this->string .= "{" . PHP_EOL;
        foreach ($section->iterateOptions() as $option) {
            $this->string .= "\t{$option}" . PHP_EOL;
        }
        $this->string .= "}" . PHP_EOL . PHP_EOL;
    }

    /**
     * @internal
     * ArrayDeserializer constructor.
     */
    private function __construct()
    {
    }

    /**
     * @var string
     */
    private $string = "";

    /**
     * @var Configuration
     */
    private $object;
}