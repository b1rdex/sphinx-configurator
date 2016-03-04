<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:19 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions;


use LTDBeget\sphinxConfigurator\exceptions\NotFoundException;
use LTDBeget\sphinxConfigurator\lib\settings\SearchdSettings;

/**
 * Class SearchdOptionAppender
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions
 *
 * @method SearchdOption addAttrFlushPeriod(string $value)
 * @method SearchdOption addBinlogFlush(string $value)
 * @method SearchdOption addBinlogMaxLogSize(string $value)
 * @method SearchdOption addBinlogPath(string $value)
 * @method SearchdOption addClientTimeout(string $value)
 * @method SearchdOption addCollationLibcLocale(string $value)
 * @method SearchdOption addCollationServer(string $value)
 * @method SearchdOption addDistThreads(string $value)
 * @method SearchdOption addExpansionLimit(string $value)
 * @method SearchdOption addHaPeriodKarma(string $value)
 * @method SearchdOption addHaPingInterval(string $value)
 * @method SearchdOption addListen(string $value)
 * @method SearchdOption addListenBacklog(string $value)
 * @method SearchdOption addLog(string $value)
 * @method SearchdOption addMaxBatchQueries(string $value)
 * @method SearchdOption addMaxChildren(string $value)
 * @method SearchdOption addMaxFilters(string $value)
 * @method SearchdOption addMaxFilterValues(string $value)
 * @method SearchdOption addMaxPacketSize(string $value)
 * @method SearchdOption addMvaUpdatesPool(string $value)
 * @method SearchdOption addMysqlVersionString(string $value)
 * @method SearchdOption addPersistentConnectionsLimit(string $value)
 * @method SearchdOption addPidFile(string $value)
 * @method SearchdOption addPredictedTimeCosts(string $value)
 * @method SearchdOption addPreforkRotationThrottle(string $value)
 * @method SearchdOption addPreopenIndexes(string $value)
 * @method SearchdOption addQueryLog(string $value)
 * @method SearchdOption addQueryLogFormat(string $value)
 * @method SearchdOption addReadBuffer(string $value)
 * @method SearchdOption addReadTimeout(string $value)
 * @method SearchdOption addReadUnhinted(string $value)
 * @method SearchdOption addRtFlushPeriod(string $value)
 * @method SearchdOption addRtMergeIops(string $value)
 * @method SearchdOption addRtMergeMaxiosize(string $value)
 * @method SearchdOption addSeamlessRotate(string $value)
 * @method SearchdOption addSnippetsFilePrefix(string $value)
 * @method SearchdOption addSphinxqlState(string $value)
 * @method SearchdOption addSubtreeDocsCache(string $value)
 * @method SearchdOption addSubtreeHitsCache(string $value)
 * @method SearchdOption addThreadStack(string $value)
 * @method SearchdOption addUnlinkOld(string $value)
 * @method SearchdOption addWatchdog(string $value)
 * @method SearchdOption addWorkers(string $value)
 *
 */
class SearchdOptionAppender
{
    /**
     * SearchdOptionAppender constructor.
     * @param SearchdSettings $searchdSettings
     */
    public function __construct(SearchdSettings $searchdSettings)
    {
        $this->searchdSettings = $searchdSettings;
    }

    /**
     * @param string $methodName
     * @param array $arguments
     * @return SearchdOption
     * @throws NotFoundException
     */
    public function __call (string $methodName, array $arguments) : SearchdOption
    {
        $optionName = str_replace("add", "", $methodName);
        $optionClass = __NAMESPACE__."\\concreteOptions\\".$optionName;
        if(! class_exists($optionClass)) {
            throw new NotFoundException("Trying to add unknown option {$optionName} to Common settings");
        }

        /**
         * @var SearchdOption $option
         */
        $option = new $optionClass($this->getSearchd(), $arguments[0]);
        $this->getSearchd()->addOption($option);

        return $option;
    }

    /**
     * @var SearchdSettings
     */
    private $searchdSettings;

    /**
     * @return SearchdSettings
     */
    private function getSearchd() : SearchdSettings
    {
        return $this->searchdSettings;
    }
}