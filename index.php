<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 4:34 PM
 */

use LTDBeget\sphinxConfigurator\serializers\PlainSerializer;
use LTDBeget\sphinxConfigurator\SphinxConfiguration;

require 'vendor/autoload.php';

$config = new SphinxConfiguration();

$source = $config->addSource("source1");
$source->getOptionAppender()->addType("type");

$source = $config->addSource("source2", "source1");
$source->getOptionAppender()->addType("type2");

$index = $config->addIndex("index1");
$index->getOptionAppender()->addSource("source1");

$index = $config->addIndex("index2", "index1");
$index->getOptionAppender()->addSource("source2");

$value = "test";

$config->getSearchd()->getOptionAppender()->addListen("9000");
$config->getSearchd()->getOptionAppender()->addListen("1000");
$config->getSearchd()->getOptionAppender()->addListen("1233");
$config->getSearchd()->getOptionAppender()->addListen("3035");
$config->getSearchd()->getOptionAppender()->addAttrFlushPeriod($value);
$config->getSearchd()->getOptionAppender()->addBinlogFlush($value);
$config->getSearchd()->getOptionAppender()->addBinlogMaxLogSize($value);
$config->getSearchd()->getOptionAppender()->addBinlogPath($value);
$config->getSearchd()->getOptionAppender()->addClientTimeout($value);
$config->getSearchd()->getOptionAppender()->addCollationLibcLocale($value);
$config->getSearchd()->getOptionAppender()->addCollationServer($value);
$config->getSearchd()->getOptionAppender()->addDistThreads($value);
$config->getSearchd()->getOptionAppender()->addExpansionLimit($value);
$config->getSearchd()->getOptionAppender()->addHaPeriodKarma($value);
$config->getSearchd()->getOptionAppender()->addHaPingInterval($value);
$config->getSearchd()->getOptionAppender()->addListen($value);
$config->getSearchd()->getOptionAppender()->addListenBacklog($value);
$config->getSearchd()->getOptionAppender()->addLog($value);
$config->getSearchd()->getOptionAppender()->addMaxBatchQueries($value);
$config->getSearchd()->getOptionAppender()->addMaxChildren($value);
$config->getSearchd()->getOptionAppender()->addMaxFilters($value);
$config->getSearchd()->getOptionAppender()->addMaxFilterValues($value);
$config->getSearchd()->getOptionAppender()->addMaxPacketSize($value);
$config->getSearchd()->getOptionAppender()->addMvaUpdatesPool($value);
$config->getSearchd()->getOptionAppender()->addMysqlVersionString($value);
$config->getSearchd()->getOptionAppender()->addPersistentConnectionsLimit($value);
$config->getSearchd()->getOptionAppender()->addPidFile($value);
$config->getSearchd()->getOptionAppender()->addPredictedTimeCosts($value);
$config->getSearchd()->getOptionAppender()->addPreforkRotationThrottle($value);
$config->getSearchd()->getOptionAppender()->addPreopenIndexes($value);
$config->getSearchd()->getOptionAppender()->addQueryLog($value);
$config->getSearchd()->getOptionAppender()->addQueryLogFormat($value);
$config->getSearchd()->getOptionAppender()->addReadBuffer($value);
$config->getSearchd()->getOptionAppender()->addReadTimeout($value);
$config->getSearchd()->getOptionAppender()->addReadUnhinted($value);
$config->getSearchd()->getOptionAppender()->addRtFlushPeriod($value);
$config->getSearchd()->getOptionAppender()->addRtMergeIops($value);
$config->getSearchd()->getOptionAppender()->addRtMergeMaxiosize($value);
$config->getSearchd()->getOptionAppender()->addSeamlessRotate($value);
$config->getSearchd()->getOptionAppender()->addSnippetsFilePrefix($value);
$config->getSearchd()->getOptionAppender()->addSphinxqlState($value);
$config->getSearchd()->getOptionAppender()->addSubtreeDocsCache($value);
$config->getSearchd()->getOptionAppender()->addSubtreeHitsCache($value);
$config->getSearchd()->getOptionAppender()->addThreadStack($value);
$config->getSearchd()->getOptionAppender()->addUnlinkOld($value);
$config->getSearchd()->getOptionAppender()->addWatchdog($value);
$config->getSearchd()->getOptionAppender()->addWorkers($value);


$config->getIndexer()->getOptionAppender()->addLemmatizerCache($value);
$config->getIndexer()->getOptionAppender()->addMaxFileFieldBuffer($value);
$config->getIndexer()->getOptionAppender()->addMaxIops($value);
$config->getIndexer()->getOptionAppender()->addMaxIosize($value);
$config->getIndexer()->getOptionAppender()->addMaxXmlpipe2Field($value);
$config->getIndexer()->getOptionAppender()->addMemLimit($value);
$config->getIndexer()->getOptionAppender()->addOnFileFieldError($value);
$config->getIndexer()->getOptionAppender()->addWriteBuffer($value);

$config->getCommon()->getOptionAppender()->addJsonAutoconvKeynames($value);
$config->getCommon()->getOptionAppender()->addJsonAutoconvNumbers($value);
$config->getCommon()->getOptionAppender()->addLemmatizerBase($value);
$config->getCommon()->getOptionAppender()->addOnJsonAttrError($value);
$config->getCommon()->getOptionAppender()->addPluginDir($value);
$config->getCommon()->getOptionAppender()->addRlpEnvironment($value);
$config->getCommon()->getOptionAppender()->addRlpMaxBatchDocs($value);
$config->getCommon()->getOptionAppender()->addRlpMaxBatchSize($value);
$config->getCommon()->getOptionAppender()->addRlpRoot($value);



echo PlainSerializer::serialize($config);
