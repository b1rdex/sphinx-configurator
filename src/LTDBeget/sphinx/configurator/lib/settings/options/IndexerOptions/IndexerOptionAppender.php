<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:17 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions;


use LTDBeget\sphinx\configurator\exceptions\NotFoundException;
use LTDBeget\sphinx\configurator\lib\OptionAppender;
use LTDBeget\sphinx\configurator\lib\settings\IndexerSettings;

/**
 * Class IndexerOptionAppender
 * @package LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions
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
class IndexerOptionAppender extends OptionAppender
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
    public function __call(string $methodName, array $arguments) : IndexerOption
    {
        $optionClass = $this->getOptionClassByMethodName($methodName);

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