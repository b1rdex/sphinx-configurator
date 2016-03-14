<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 5:13 PM
 */

namespace LTDBeget\sphinxConfigurator\serializers;


use LTDBeget\sphinxConfigurator\parser\SphinxConfigurationParser;
use LTDBeget\sphinxConfigurator\SphinxConfiguration;

/**
 * Class PlainSerializer
 * serialize SphinxConfiguration object to string
 * and file content from sphinx.conf file to SphinxConfiguration object
 * @package LTDBeget\sphinxConfigurator\serializers
 */
final class PlainSerializer
{
    /**
     * Make plain content for sphinx configuration file from SphinxConfiguration object
     * @param SphinxConfiguration $configuration
     * @return string
     */
    public static function serialize(SphinxConfiguration $configuration) : string
    {
        $plainConfig = "";

        foreach($configuration->iterateSource() as $source) {
            $plainConfig .= "{$source}".PHP_EOL;
            $plainConfig .= "{".PHP_EOL;
            foreach($source->iterateOptions() as $option) {
                $plainConfig .= "\t{$option}".PHP_EOL;
            }
            $plainConfig .= "}".PHP_EOL.PHP_EOL;
        }

        foreach($configuration->iterateIndex() as $index) {
            $plainConfig .= "{$index}".PHP_EOL;
            $plainConfig .= "{".PHP_EOL;
            foreach($index->iterateOptions() as $option) {
                $plainConfig .= "\t{$option}".PHP_EOL;
            }
            $plainConfig .= "}".PHP_EOL.PHP_EOL;
        }

        if($configuration->isHasIndexer()) {
            $indexer = $configuration->getIndexer();
            $plainConfig .= "{$indexer}".PHP_EOL;
            $plainConfig .= "{".PHP_EOL;
            foreach($indexer->iterateOptions() as $option) {
                $plainConfig .= "\t{$option}".PHP_EOL;
            }
            $plainConfig .= "}".PHP_EOL.PHP_EOL;
        }

        if($configuration->isHasSearchd()) {
            $searchd = $configuration->getSearchd();
            $plainConfig .= "{$searchd}".PHP_EOL;
            $plainConfig .= "{".PHP_EOL;
            foreach($searchd->iterateOptions() as $option) {
                $plainConfig .= "\t{$option}".PHP_EOL;
            }
            $plainConfig .= "}".PHP_EOL.PHP_EOL;
        }

        if($configuration->isHasCommon()) {
            $common = $configuration->getCommon();
            $plainConfig .= "{$common}".PHP_EOL;
            $plainConfig .= "{".PHP_EOL;
            foreach($common->iterateOptions() as $option) {
                $plainConfig .= "\t{$option}".PHP_EOL;
            }
            $plainConfig .= "}".PHP_EOL.PHP_EOL;
        }

        return $plainConfig;
    }

    /**
     * Make SphinxConfiguration object from plain content of sphinx configuration file
     * @param String $configuration
     * @return SphinxConfiguration
     */
    public static function deserialize(string $configuration) : SphinxConfiguration
    {
        return ArraySerializer::deserialize(SphinxConfigurationParser::parse($configuration));
    }
}