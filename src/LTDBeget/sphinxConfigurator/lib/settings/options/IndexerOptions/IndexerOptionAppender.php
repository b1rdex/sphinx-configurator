<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:17 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions;


use LTDBeget\sphinxConfigurator\exceptions\NotFoundException;
use LTDBeget\sphinxConfigurator\lib\settings\IndexerSettings;

/**
 * Class IndexerOptionAppender
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions
 *
 * @method IndexerOption addLemmatizerCache(string $value)
 * @method IndexerOption addMaxFileFieldBuffer(string $value)
 * @method IndexerOption addMaxIops(string $value)
 * @method IndexerOption addMaxIosize(string $value)
 * @method IndexerOption addMaxXmlpipe2Field(string $value)
 * @method IndexerOption addMemLimit(string $value)
 * @method IndexerOption addOnFileFieldError(string $value)
 * @method IndexerOption addWriteBuffer(string $value)
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
     * @param string $methodName
     * @param array $arguments
     * @return IndexerOption
     * @throws NotFoundException
     */
    public function __call (string $methodName, array $arguments) : IndexerOption
    {
        $optionName = str_replace("add", "", $methodName);
        $optionClass = __NAMESPACE__."\\concreteOptions\\".$optionName;
        if(! class_exists($optionClass)) {
            throw new NotFoundException("Trying to add unknown option {$optionName} to Indexer settings");
        }

        /**
         * @var IndexerOption $option
         */
        $option = new $optionClass($this->getIndexer(), $arguments[0]);
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