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
     * @expectedException \LTDBeget\sphinx\configurator\exceptions\ConfigurationException
     * @expectedExceptionMessage Sphinx of version 2.1.8 does't have section common
     */
    public function testCheckConfigValidInNewerVersionAndInvalidInPrevious()
    {
        $config_path = __DIR__. '/../sphinx/conf/valid.example.conf';
        $plain_config = file_get_contents($config_path);
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        Configuration::fromString($plain_config, eVersion::V_2_1_8());
        
    }

    /**
     * @expectedException \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @expectedExceptionMessage Inheritance with name SOmeDummyInheritance of section source doesn't exists in configuration
     */
    public function testNotFoundInheritanceSource()
    {
        $config_path = __DIR__ . '/../sphinx/conf/invalid/inheritance_source.conf';
        $plain_config = file_get_contents($config_path);
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        Configuration::fromString($plain_config, eVersion::V_2_1_8());
    }

    /**
     * @expectedException \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @expectedExceptionMessage Inheritance with name some_dummy_inheritance of section index doesn't exists in configuration
     */
    public function testNotFoundInheritanceIndex()
    {
        $config_path = __DIR__ . '/../sphinx/conf/invalid/inheritance_index.conf';
        $plain_config = file_get_contents($config_path);
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        Configuration::fromString($plain_config, eVersion::V_2_1_8());
    }

    /**
     * @expectedException \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @expectedExceptionMessage Duplicate name mainSource found in source section
     */
    public function testDuplicateNameSource()
    {
        $config_path = __DIR__ . '/../sphinx/conf/invalid/duplicate_source_name.conf';
        $plain_config = file_get_contents($config_path);
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        Configuration::fromString($plain_config, eVersion::V_2_1_8());
    }

    /**
     * @expectedException \LTDBeget\sphinx\configurator\exceptions\SectionException
     * @expectedExceptionMessage Duplicate name user_index found in index section
     */
    public function testDuplicateNameIndex()
    {
        $config_path = __DIR__ . '/../sphinx/conf/invalid/duplicate_index_name.conf';
        $plain_config = file_get_contents($config_path);
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        Configuration::fromString($plain_config, eVersion::V_2_1_8());
    }

    public function testChainSerializeDeserialize()
    {
        $config_path = __DIR__. '/../sphinx/conf/valid.example.conf';
        $plain_config = file_get_contents($config_path);

        $referenceHash = md5((string) Configuration::fromString($plain_config, eVersion::V_2_2_10()));


        $config = Configuration::fromString($plain_config, eVersion::V_2_2_10());
        $config = Configuration::fromArray($config->toArray(), eVersion::V_2_2_10());
        $config = Configuration::fromJson($config->toJson(), eVersion::V_2_2_10());
        $config = Configuration::fromString( (string) $config, eVersion::V_2_2_10());

        $hash = md5((string) $config);

        static::assertEquals($referenceHash, $hash);
    }

    public function testDelete()
    {
        $config_path = __DIR__. '/../sphinx/conf/valid.example.conf';
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
        
        /** @noinspection SpellCheckingInspection */
        static::assertEquals('f26517544c25d8ef994622380a0afbe9', $hash);
    }
    
    public function testCheckGetInheritance()
    {
        $configuration = new Configuration(eVersion::V_2_2_10());

        $parent_name = 'source1';
        $child_name = 'source2';

        $parent = $configuration->addSource($parent_name);
        $child = $configuration->addSource($child_name, $parent_name);

        static::assertSame($child->getInheritance(), $parent);
    }


    public function testOnRemoveParentRemoveChild()
    {
        $configuration = new Configuration(eVersion::V_2_2_10());

        $parent_name = "source1";
        $child_name = "source2";

        $parent = $configuration->addSource($parent_name);
        $child = $configuration->addSource($child_name, $parent_name);

        $parent->delete();

        static::assertTrue($child->isDeleted());
    }
}
