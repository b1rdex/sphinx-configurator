<?php
/**
 * @author: Viskov Sergey
 * @date  : 3/2/16
 * @time  : 4:33 PM
 */

namespace LTDBeget\sphinx\configurator;

use LTDBeget\sphinx\configurator\configurationEntities\sections\Common;
use LTDBeget\sphinx\configurator\configurationEntities\sections\Index;
use LTDBeget\sphinx\configurator\configurationEntities\sections\Indexer;
use LTDBeget\sphinx\configurator\configurationEntities\sections\Searchd;
use LTDBeget\sphinx\configurator\configurationEntities\sections\Source;
use LTDBeget\sphinx\configurator\deserializers\ArrayDeserializer;
use LTDBeget\sphinx\configurator\deserializers\JsonDeserializer;
use LTDBeget\sphinx\configurator\deserializers\PlainDeserializer;
use LTDBeget\sphinx\configurator\exceptions\ConfigurationException;
use LTDBeget\sphinx\configurator\serializers\ArraySerializer;
use LTDBeget\sphinx\configurator\serializers\JsonSerializer;
use LTDBeget\sphinx\configurator\serializers\PlainSerializer;
use LTDBeget\sphinx\enums\eSection;
use LTDBeget\sphinx\enums\eVersion;
use LTDBeget\sphinx\informer\Informer;

/**
 * Class Configuration
 *
 * @package LTDBeget\sphinx\configurator
 */
class Configuration
{
    /**
     * @param string   $plainData
     * @param eVersion $version
     *
     * @return Configuration
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \LTDBeget\sphinx\configurator\exceptions\ConfigurationException
     * @throws \LTDBeget\sphinx\configurator\exceptions\DeserializeException
     * @throws \LTDBeget\sphinx\SyntaxErrorException
     * @throws \BadMethodCallException
     * @throws \LTDBeget\sphinx\informer\exceptions\DocumentationSourceException
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     */
    public static function fromString(string $plainData, eVersion $version) : Configuration
    {
        return PlainDeserializer::deserialize($plainData, new self($version));
    }

    /**
     * @param array    $plainData
     * @param eVersion $version
     *
     * @return Configuration
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \BadMethodCallException
     * @throws \LTDBeget\sphinx\configurator\exceptions\ConfigurationException
     * @throws \LTDBeget\sphinx\configurator\exceptions\DeserializeException
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     * @throws \LTDBeget\sphinx\informer\exceptions\DocumentationSourceException
     */
    public static function fromArray(array $plainData, eVersion $version) : Configuration
    {
        return ArrayDeserializer::deserialize($plainData, new self($version));
    }

    /**
     * @param string   $plainData
     * @param eVersion $version
     *
     * @return Configuration
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \BadMethodCallException
     * @throws \LTDBeget\sphinx\configurator\exceptions\ConfigurationException
     * @throws \LTDBeget\sphinx\configurator\exceptions\DeserializeException
     * @throws \LTDBeget\sphinx\informer\exceptions\DocumentationSourceException
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     */
    public static function fromJson(string $plainData, eVersion $version) : Configuration
    {
        return JsonDeserializer::deserialize($plainData, new self($version));
    }

    /**
     * Configuration constructor.
     *
     * @param eVersion $version
     *
     * @throws \LTDBeget\sphinx\informer\exceptions\DocumentationSourceException
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     */
    public function __construct(eVersion $version)
    {
        $this->version  = $version;
        $this->informer = Informer::get($this->version);
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        try {
            $string = PlainSerializer::serialize($this);
        } catch (\Exception $e) {
            $string = '';
        }

        return $string;
    }

    /**
     * @return array
     * @throws \InvalidArgumentException
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @throws \LogicException
     * @throws \LTDBeget\sphinx\configurator\exceptions\ConfigurationException
     */
    public function toArray() : array
    {
        return ArraySerializer::serialize($this);
    }

    /**
     * @return string
     * @throws \LogicException
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @throws \InvalidArgumentException
     * @throws \LTDBeget\sphinx\configurator\exceptions\ConfigurationException
     */
    public function toJson() : string
    {
        return JsonSerializer::serialize($this);
    }

    /**
     * @return Informer
     */
    public function getInformer() : Informer
    {
        return $this->informer;
    }

    /**
     * @return eVersion
     */
    public function getVersion() : eVersion
    {
        return $this->version;
    }

    /**
     * @param string      $name
     * @param string|null $inheritanceName
     *
     * @return Source
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \BadMethodCallException
     */
    public function addSource(string $name, string $inheritanceName = NULL) : Source
    {
        $source          = new Source($this, $name, $inheritanceName);
        $this->sources[] = $source;

        return $source;
    }

    /**
     * @return Source[]
     */
    public function iterateSource()
    {
        foreach ($this->sources as $source) {
            if (!$source->isDeleted()) {
                yield $source;
            }
        }
    }

    /**
     * @param string      $name
     * @param string|null $inheritanceName
     *
     * @return Index
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \BadMethodCallException
     */
    public function addIndex(string $name, string $inheritanceName = NULL) : Index
    {
        $indexDefinition = new Index($this, $name, $inheritanceName);
        $this->indexes[] = $indexDefinition;

        return $indexDefinition;
    }

    /**
     * @return Index[]
     */
    public function iterateIndex()
    {
        foreach ($this->indexes as $index) {
            if (!$index->isDeleted()) {
                yield $index;
            }
        }
    }

    /**
     * @param eSection $section
     *
     * @return bool
     */
    public function isAllowedSection(eSection $section) : bool
    {
        return $this->informer->isSectionExist($section);
    }

    /**
     * @return Indexer
     */
    public function getIndexer() : Indexer
    {
        if (!$this->isHasIndexer()) {
            $this->initIndexer();
        }

        return $this->indexer;
    }

    /**
     * @return Searchd
     */
    public function getSearchd() : Searchd
    {
        if (!$this->isHasSearchd()) {
            $this->initSearchd();
        }

        return $this->searchd;
    }

    /**
     * @return Common
     * @throws \LTDBeget\sphinx\configurator\exceptions\ConfigurationException
     */
    public function getCommon() : Common
    {
        $section = eSection::COMMON();
        if (!$this->isAllowedSection($section)) {
            throw new ConfigurationException("Sphinx of version {$this->version} does't have section {$section}");
        }

        if (!$this->isHasCommon()) {
            $this->initCommon();
        }

        return $this->common;
    }

    /**
     * @return bool
     */
    public function isHasIndexer() : bool
    {
        return NULL !== $this->indexer;
    }

    /**
     * @return bool
     */
    public function isHasSearchd() : bool
    {
        return NULL !== $this->searchd;
    }

    /**
     * @return bool
     */
    public function isHasCommon() : bool
    {
        return NULL !== $this->common;
    }

    /**
     * @return Configuration
     */
    private function initIndexer() : self
    {
        $this->indexer = new Indexer($this);

        return $this;
    }

    /**
     * @return Configuration
     */
    private function initSearchd() : self
    {
        $this->searchd = new Searchd($this);

        return $this;
    }

    /**
     * @return Configuration
     */
    private function initCommon() : self
    {
        $this->common = new Common($this);

        return $this;
    }

    /**
     * @var eVersion
     */
    private $version;

    /**
     * @var Informer
     */
    private $informer;

    /**
     * @var Source[]
     */
    private $sources = [];

    /**
     * @var Index[]
     */
    private $indexes = [];

    /**
     * @var Indexer
     */
    private $indexer;

    /**
     * @var Searchd
     */
    private $searchd;

    /**
     * @var Common
     */
    private $common;
}