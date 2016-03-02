<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 4:33 PM
 */

namespace LTDBeget\sphinxConfigurator;


use LTDBeget\sphinxConfigurator\exceptions\WrongContextException;
use LTDBeget\sphinxConfigurator\lib\definitions\IndexDefinition;
use LTDBeget\sphinxConfigurator\lib\definitions\SourceDefinition;

/**
 * Class SphinxConfiguration
 * @package LTDBeget\sphinxConfigurator
 */
class SphinxConfiguration
{
    /**
     * @var SourceDefinition[]
     */
    private $sources = [];

    /**
     * @var IndexDefinition[]
     */
    private $indexes = [];

    /**
     * @param SourceDefinition $sourceDefinition
     * @return SphinxConfiguration
     * @throws WrongContextException
     */
    public function addSource(SourceDefinition $sourceDefinition) : self
    {
        if($sourceDefinition->getConfiguration() !== $this) {
            throw new WrongContextException("Can't add source with different context");
        }
        $this->sources[] = $sourceDefinition;

        return $this;
    }

    /**
     * @return SourceDefinition[]
     */
    public function iterateSource()
    {
        foreach($this->sources as $source) {
            yield $source;
        }
    }

    /**
     * @param IndexDefinition $indexDefinition
     * @return SphinxConfiguration
     * @throws WrongContextException
     */
    public function addIndex(IndexDefinition $indexDefinition) : self
    {
        if($indexDefinition->getConfiguration() !== $this) {
            throw new WrongContextException("Can't add index with different context");
        }
        $this->indexes[] = $indexDefinition;

        return $this;
    }

    /**
     * @return IndexDefinition[]
     */
    public function iterateIndex()
    {
        foreach($this->indexes as $index) {
            yield $index;
        }
    }

    /**
     * @return bool
     */
    public function validate() : bool
    {
        foreach($this->iterateSource() as $source) {
            if(! $source->validate()) {
                return false;
            }
        }

        foreach($this->iterateIndex() as $index) {
            if(! $index->validate()) {
                return false;
            }
        }

        return true;
    }
}