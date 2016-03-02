<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:17 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions;


use LTDBeget\sphinxConfigurator\lib\IndexerSettings;

/**
 * Class IndexerOptionAppender
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions
 */
class IndexerOptionAppender
{
    /**
     * @var IndexerSettings
     */
    private $indexerSettings;

    /**
     * IndexerOptionAppender constructor.
     * @param IndexerSettings $indexerSettings
     */
    public function __construct(IndexerSettings $indexerSettings)
    {
        $this->indexerSettings = $indexerSettings;
    }

    /**
     * @return IndexerSettings
     */
    public function getIndexer() : IndexerSettings
    {
        return $this->indexerSettings;
    }
}