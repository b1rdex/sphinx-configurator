<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 4:33 PM
 */

namespace LTDBeget\sphinx\configurator;


use LTDBeget\sphinx\configurator\exceptions\NotFoundException;
use LTDBeget\sphinx\configurator\lib\definitions\IndexDefinition;
use LTDBeget\sphinx\configurator\lib\definitions\SourceDefinition;
use LTDBeget\sphinx\configurator\lib\settings\CommonSettings;
use LTDBeget\sphinx\configurator\lib\settings\IndexerSettings;
use LTDBeget\sphinx\configurator\lib\settings\SearchdSettings;

/**
 * Class Configuration
 * @package LTDBeget\sphinx\configurator
 */
class Configuration
{
    /**
     * @param string $name
     * @param string|null $inheritanceName
     * @return SourceDefinition
     * @throws NotFoundException
     */
    public function addSource(string $name, string $inheritanceName = null) : SourceDefinition
    {
        $sourceDefinition = new SourceDefinition($this, $name, $inheritanceName);

        if (!is_null($inheritanceName) && !$this->isSourceParentExists($inheritanceName)) {
            throw new NotFoundException("Source parent with name {$inheritanceName} does't exists in configuration");
        }

        $this->sources[] = $sourceDefinition;

        return $sourceDefinition;
    }

    /**
     * @return SourceDefinition[]
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
     * @return IndexDefinition
     * @throws NotFoundException
     */
    public function addIndex(string $name, string $inheritanceName = null) : IndexDefinition
    {
        $indexDefinition = new IndexDefinition($this, $name, $inheritanceName);

        if (!is_null($inheritanceName) && !$this->isIndexParentExists($inheritanceName)) {
            throw new NotFoundException("Index parent with name {$inheritanceName} does't exists in configuration");
        }

        $this->indexes[] = $indexDefinition;

        return $indexDefinition;
    }

    /**
     * @return IndexDefinition[]
     */
    public function iterateIndex()
    {
        foreach ($this->indexes as $index) {
            yield $index;
        }
    }

    /**
     * @return IndexerSettings
     */
    public function getIndexer() : IndexerSettings
    {
        if (!$this->isHasIndexer()) {
            $this->initIndexer();
        }

        return $this->indexer;
    }

    /**
     * @return bool
     */
    public function isHasIndexer() : bool
    {
        return !is_null($this->indexer);
    }

    /**
     * @return SearchdSettings
     */
    public function getSearchd() : SearchdSettings
    {
        if (!$this->isHasSearchd()) {
            $this->initSearchd();
        }

        return $this->searchd;
    }

    /**
     * @return bool
     */
    public function isHasSearchd() : bool
    {
        return !is_null($this->searchd);
    }

    /**
     * @return CommonSettings
     */
    public function getCommon() : CommonSettings
    {
        if (!$this->isHasCommon()) {
            $this->initCommon();
        }

        return $this->common;
    }

    /**
     * @return bool
     */
    public function isHasCommon() : bool
    {
        return !is_null($this->common);
    }

    /**
     * @return bool
     */
    public function validate() : bool
    {
        $result = true;

        foreach ($this->iterateSource() as $source) {
            if (!$source->validate()) {
                $result = false;
            }
        }

        foreach ($this->iterateIndex() as $index) {
            if (!$index->validate()) {
                $result = false;
            }
        }

        if ($this->isHasCommon() && !$this->getCommon()->validate()) {
            $result = false;
        }

        if ($this->isHasIndexer() && !$this->getIndexer()->validate()) {
            $result = false;
        }

        if ($this->isHasSearchd() && !$this->getSearchd()->validate()) {
            $result = false;
        }

        return $result;
    }

    /**
     * @var SourceDefinition[]
     */
    private $sources = [];

    /**
     * @var IndexDefinition[]
     */
    private $indexes = [];

    /**
     * @var IndexerSettings
     */
    private $indexer = null;

    /**
     * @var SearchdSettings
     */
    private $searchd = null;

    /**
     * @var CommonSettings
     */
    private $common = null;

    /**
     * @return Configuration
     */
    private function initIndexer() : self
    {
        $this->indexer = new IndexerSettings($this);

        return $this;
    }

    /**
     * @return Configuration
     */
    private function initSearchd() : self
    {
        $this->searchd = new SearchdSettings($this);

        return $this;
    }

    /**
     * @return Configuration
     */
    private function initCommon() : self
    {
        $this->common = new CommonSettings($this);

        return $this;
    }

    /**
     * @param string $parentName
     * @return bool
     */
    private function isSourceParentExists(string $parentName) : bool
    {
        $exist = false;
        foreach ($this->iterateSource() as $source) {
            if ($source->getName() === $parentName) {
                $exist = true;
            }
        }

        return $exist;
    }

    /**
     * @param string $parentName
     * @return bool
     */
    private function isIndexParentExists(string $parentName) : bool
    {
        $exist = false;
        foreach ($this->iterateIndex() as $index) {
            if ($index->getName() === $parentName) {
                $exist = true;
            }
        }

        return $exist;
    }
}