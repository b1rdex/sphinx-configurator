<?php

use LTDBeget\sphinx\configurator\ConfigurationFactory;
use LTDBeget\sphinx\configurator\ConfigurationHelper;
use LTDBeget\sphinx\enums\eSection;
use LTDBeget\sphinx\enums\eVersion;
use LTDBeget\sphinx\enums\options\eCommonOption;
use LTDBeget\sphinx\enums\options\eIndexOption;
use LTDBeget\sphinx\informer\exceptions\InformerRuntimeException;
use LTDBeget\sphinx\informer\Informer;
use PHPUnit\Framework\TestCase;

/**
 * @author: Viskov Sergey
 * @date: 20.03.16
 * @time: 16:01
 */
class InformerTest extends TestCase
{
    public function testAllOptionInfo()
    {
        foreach( eVersion::getConstants() as $version) {
            $version = eVersion::get($version);
            $informer = Informer::get($version);
            foreach(eSection::getConstants() as $section) {
                $section = eSection::get($section);
                if($informer->isSectionExist($section)) {
                    foreach($informer->iterateOptionInfo($section) as $optionInfo) {
                        static::assertNotEmpty($optionInfo->getSection());
                        static::assertNotEmpty($optionInfo->getName());
                        static::assertNotEmpty($optionInfo->getDescription(), var_export($optionInfo, true));
                        static::assertNotEmpty($optionInfo->getDocLink());
                        static::assertNotEmpty($optionInfo->getVersion());
                    }
                }

            }
        }
    }

    public function testUnknownSection()
    {
        $this->expectException(\LTDBeget\sphinx\informer\exceptions\InformerRuntimeException::class);
        $this->expectExceptionMessage('Sphinx v.2.1.9 does\'t have section `common`');

        $informer = Informer::get(eVersion::V_2_1_9());
        $informer->getOptionInfo(eSection::COMMON(), eCommonOption::JSON_AUTOCONV_KEYNAMES());
    }

    public function testManticore()
    {
        $informer = Informer::get(eVersion::V_MANTICORE_3_1_2());
        try {
            $informer->getOptionInfo(eSection::INDEX(), eIndexOption::KILLLIST_TARGET());
        } catch (InformerRuntimeException $e) {
            static::fail('Manticore does have such option!');
        }

        $this->expectException(\LTDBeget\sphinx\informer\exceptions\InformerRuntimeException::class);
        $this->expectExceptionMessage('Sphinx v.manticore_3.1.2 option kbatch in `index` isn\'t available');
        $informer->getOptionInfo(eSection::INDEX(), eIndexOption::KBATCH());
    }

    public function testGetInfoFromConfiguration()
    {
        $config_path = __DIR__. '/../sphinx/conf/valid.example.conf';
        $plain_config = file_get_contents($config_path);
        $config = ConfigurationFactory::fromString($plain_config, eVersion::V_2_2_10());
        foreach($config->iterateIndexes() as $section) {
            foreach($section->iterateOptions() as $option) {
                static::assertNotEmpty($option->getInfo());
            }
        }
        foreach($config->iterateSources() as $section) {
            foreach($section->iterateOptions() as $option) {
                static::assertNotEmpty($option->getInfo());
            }
        }

        if($config->hasIndexer()) {
            foreach(ConfigurationHelper::getOrCreateIndexer($config)->iterateOptions() as $option) {
                static::assertNotEmpty($option->getInfo());
            }
        }

        if($config->hasSearchd()) {
            foreach(ConfigurationHelper::getOrCreateSearchd($config)->iterateOptions() as $option) {
                static::assertNotEmpty($option->getInfo());
            }
        }

        if($config->hasCommon()) {
            foreach(ConfigurationHelper::getOrCreateCommon($config)->iterateOptions() as $option) {
                static::assertNotEmpty($option->getInfo());
            }
        }
    }
}
