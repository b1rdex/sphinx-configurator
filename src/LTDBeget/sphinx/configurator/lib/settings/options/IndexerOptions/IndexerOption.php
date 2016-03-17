<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:16 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions;


use LTDBeget\sphinx\configurator\lib\Option;
use LTDBeget\sphinx\configurator\lib\settings\IndexerSettings;

/**
 * Class IndexerOption
 * @package LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions
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
        $this->value           = $value;
        $this->indexerSettings = $indexerSettings;
    }

    /**
     * Indexer settings has no multi-value options
     * @return bool
     */
    final public function isMultiValue() : bool
    {
        return false;
    }

    /**
     * @return IndexerSettings
     */
    public function getIndexer() : IndexerSettings
    {
        return $this->indexerSettings;
    }
}