<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 5:13 PM
 */

namespace LTDBeget\sphinx\configurator\serializers;


use LTDBeget\sphinx\configurator\Configuration;

/**
 * Class PlainSerializer
 * serialize Configuration object to string for file .conf
 * @package LTDBeget\sphinx\configurator\serializers
 */
final class PlainSerializer
{
    /**
     * Make plain content for sphinx configuration file from Configuration object
     * @param Configuration $configuration
     * @return string
     */
    public static function serialize(Configuration $configuration) : string
    {
        $plainConfig = "";

        foreach ($configuration->iterateSource() as $source) {
            $plainConfig .= "{$source}" . PHP_EOL;
            $plainConfig .= "{" . PHP_EOL;
            foreach ($source->iterateOptions() as $option) {
                $plainConfig .= "\t{$option}" . PHP_EOL;
            }
            $plainConfig .= "}" . PHP_EOL . PHP_EOL;
        }

        foreach ($configuration->iterateIndex() as $index) {
            $plainConfig .= "{$index}" . PHP_EOL;
            $plainConfig .= "{" . PHP_EOL;
            foreach ($index->iterateOptions() as $option) {
                $plainConfig .= "\t{$option}" . PHP_EOL;
            }
            $plainConfig .= "}" . PHP_EOL . PHP_EOL;
        }

        if ($configuration->isHasIndexer()) {
            $indexer = $configuration->getIndexer();
            $plainConfig .= "{$indexer}" . PHP_EOL;
            $plainConfig .= "{" . PHP_EOL;
            foreach ($indexer->iterateOptions() as $option) {
                $plainConfig .= "\t{$option}" . PHP_EOL;
            }
            $plainConfig .= "}" . PHP_EOL . PHP_EOL;
        }

        if ($configuration->isHasSearchd()) {
            $searchd = $configuration->getSearchd();
            $plainConfig .= "{$searchd}" . PHP_EOL;
            $plainConfig .= "{" . PHP_EOL;
            foreach ($searchd->iterateOptions() as $option) {
                $plainConfig .= "\t{$option}" . PHP_EOL;
            }
            $plainConfig .= "}" . PHP_EOL . PHP_EOL;
        }

        if ($configuration->isHasCommon()) {
            $common = $configuration->getCommon();
            $plainConfig .= "{$common}" . PHP_EOL;
            $plainConfig .= "{" . PHP_EOL;
            foreach ($common->iterateOptions() as $option) {
                $plainConfig .= "\t{$option}" . PHP_EOL;
            }
            $plainConfig .= "}" . PHP_EOL . PHP_EOL;
        }

        return $plainConfig;
    }

    /**
     * @internal
     * ArrayDeserializer constructor.
     */
    private function __construct() {}
}