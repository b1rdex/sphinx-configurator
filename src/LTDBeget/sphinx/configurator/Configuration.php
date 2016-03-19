<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 4:33 PM
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
use LTDBeget\sphinx\configurator\exceptions\NotFoundException;
use LTDBeget\sphinx\configurator\serializers\ArraySerializer;
use LTDBeget\sphinx\configurator\serializers\JsonSerializer;
use LTDBeget\sphinx\configurator\serializers\PlainSerializer;
use LTDBeget\sphinx\enums\eVersion;
use LTDBeget\sphinx\informer\Informer;

/**
 * Class Configuration
 * @package LTDBeget\sphinx\configurator
 */
class Configuration
{
    /**
     * @param string $plainData
     * @param eVersion $version
     * @return Configuration
     */
    public static function fromString(string $plainData, eVersion $version) : Configuration
    {
        return PlainDeserializer::deserialize($plainData, new self($version));
    }

    /**
     * @param array $plainData
     * @param eVersion $version
     * @return Configuration
     */
    public static function fromArray(array $plainData, eVersion $version) : Configuration
    {
        return ArrayDeserializer::deserialize($plainData, new self($version));
    }

    /**
     * @param string $plainData
     * @param eVersion $version
     * @return Configuration
     */
    public static function fromJson(string $plainData, eVersion $version) : Configuration
    {
        return JsonDeserializer::deserialize($plainData, new self($version));
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return PlainSerializer::serialize($this);
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        return ArraySerializer::serialize($this);
    }

    /**
     * @return string
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
     * @param string $name
     * @param string|null $inheritanceName
     * @return Source
     * @throws NotFoundException
     */
    public function addSource(string $name, string $inheritanceName = null) : Source
    {
        $source = new Source($this, $name, $inheritanceName);
        $this->sources[] = $source;

        return $source;
    }

    /**
     * @return Source[]
     */
    public function iterateSource()
    {
        foreach ($this->sources as $source) {
            yield $source;
        }
    }

    /**
     * @param string $name
     * @param string|null $inheritanceName
     * @return Index
     */
    public function addIndex(string $name, string $inheritanceName = null) : Index
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
            yield $index;
        }
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
     */
    public function getCommon() : Common
    {
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
        return !is_null($this->indexer);
    }

    /**
     * @return bool
     */
    public function isHasSearchd() : bool
    {
        return !is_null($this->searchd);
    }

    /**
     * @return bool
     */
    public function isHasCommon() : bool
    {
        return !is_null($this->common);
    }

    /**
     * Configuration constructor.
     * @param eVersion $version
     */
    protected function __construct(eVersion $version)
    {
        $this->version = $version;
        $this->informer = Informer::get($this->version);
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
    private $indexer = null;

    /**
     * @var Searchd
     */
    private $searchd = null;

    /**
     * @var Common
     */
    private $common = null;
}