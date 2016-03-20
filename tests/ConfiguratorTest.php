<?php
/**
 * @author: Viskov Sergey
 * @date: 20.03.16
 * @time: 5:58
 */


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\enums\eVersion;

/**
 * Class ConfiguratorTest
 */
class ConfiguratorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Sphinx of version 2.1.8 does't have section common
     */
    public function testCheckConfigValidInNewerVersionAndInvalidInPrevious()
    {
        $config_path = realpath(__DIR__."/../sphinx/conf/valid.example.conf");
        $plain_config = file_get_contents($config_path);
        Configuration::fromString($plain_config, eVersion::V_2_1_8());
    }

    public function testChainSerializeDeserialize()
    {
        $config_path = realpath(__DIR__."/../sphinx/conf/valid.example.conf");
        $plain_config = file_get_contents($config_path);

        $referenceHash = md5((string) Configuration::fromString($plain_config, eVersion::V_2_2_10()));


        $config = Configuration::fromString($plain_config, eVersion::V_2_2_10());
        $config = Configuration::fromArray($config->toArray(), eVersion::V_2_2_10());
        $config = Configuration::fromJson($config->toJson(), eVersion::V_2_2_10());
        $config = Configuration::fromString( (string) $config, eVersion::V_2_2_10());

        $hash = md5((string) $config);

        $this->assertEquals($referenceHash, $hash);
    }

    public function testDelete()
    {
        $config_path = realpath(__DIR__."/../sphinx/conf/valid.example.conf");
        $plain_config = file_get_contents($config_path);

        $config = Configuration::fromString($plain_config, eVersion::V_2_2_10());
        foreach($config->iterateIndex() as $section) {
            $section->delete();
        }
        foreach($config->iterateSource() as $section) {
            $section->delete();
        }

        if($config->isHasIndexer()) {
            $config->getIndexer()->delete();
        }

        if($config->isHasSearchd()) {
            $config->getSearchd()->delete();
        }

        if($config->isHasCommon()) {
            foreach($config->getCommon()->iterateOptions() as $option) {
                $option->delete();
            }
        }

        $hash = md5((string) $config);

        $this->assertEquals("f26517544c25d8ef994622380a0afbe9", $hash);
    }

}
