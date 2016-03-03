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

$config->getSearchd()->getOptionAppender()->addListen("9000");
$config->getIndexer()->getOptionAppender()->addMemLimit("1024M");
$config->getCommon()->getOptionAppender()->addLemmatizerBase("/usr/local/share/sphinx/dicts");


echo PlainSerializer::serialize($config);
