<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:16 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions;


use LTDBeget\sphinxConfigurator\lib\settings\IndexerSettings;
use LTDBeget\sphinxConfigurator\lib\Option;

/**
 * Class IndexerOption
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions
 */
abstract class IndexerOption extends Option
{
    /**
     * @var IndexerSettings
     */
    private $indexerSettings;

    /**
     * IndexerOption constructor.
     * @param IndexerSettings $indexerSettings
     * @param string $value
     */
    public function __construct(IndexerSettings $indexerSettings, string $value)
    {
        $this->value = $value;
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