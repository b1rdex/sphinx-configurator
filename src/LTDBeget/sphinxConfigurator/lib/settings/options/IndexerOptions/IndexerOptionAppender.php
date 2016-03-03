<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:17 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions;


use LTDBeget\sphinxConfigurator\exceptions\WrongContextException;
use LTDBeget\sphinxConfigurator\lib\settings\IndexerSettings;
use LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions\concreteOptions\MemLimit;

/**
 * Class IndexerOptionAppender
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions
 */
class IndexerOptionAppender
{
    /**
     * IndexerOptionAppender constructor.
     * @param IndexerSettings $indexerSettings
     */
    public function __construct(IndexerSettings $indexerSettings)
    {
        $this->indexerSettings = $indexerSettings;
    }

    /**
     * @param $value
     * @return MemLimit
     * @throws WrongContextException
     */
    public function addMemLimit($value)
    {
        $option = new MemLimit($this->getIndexer(), $value);
        $this->getIndexer()->addOption($option);

        return $option;
    }

    /**
     * @var IndexerSettings
     */
    private $indexerSettings;

    /**
     * @return IndexerSettings
     */
    private function getIndexer() : IndexerSettings
    {
        return $this->indexerSettings;
    }
}