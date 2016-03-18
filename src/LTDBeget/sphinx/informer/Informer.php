<?php
/**
 * @author: Viskov Sergey
 * @date: 3/17/16
 * @time: 1:22 PM
 */

namespace LTDBeget\sphinx\informer;


use LTDBeget\sphinx\enums\base\eOption;
use LTDBeget\sphinx\enums\eSection;
use LTDBeget\sphinx\enums\eVersion;
use LTDBeget\sphinx\enums\options\eCommonOption;
use LTDBeget\sphinx\enums\options\eIndexerOption;
use LTDBeget\sphinx\enums\options\eIndexOption;
use LTDBeget\sphinx\enums\options\eSearchdOption;
use LTDBeget\sphinx\enums\options\eSourceOption;
use LTDBeget\sphinx\informer\exceptions\NotFoundException;
use LTDBeget\sphinx\informer\exceptions\UnknownValueException;
use LTDBeget\sphinx\informer\exceptions\YamlParseException;
use Symfony\Component\Yaml\Parser;

/**
 * Class Informer
 * Class for manipulating with options info
 * @package LTDBeget\sphinx\informer
 */
final class Informer
{
    /**
     * Get informer for concrete version, and init if did not init yet
     * @param eVersion $version
     * @return Informer
     */
    public static function get(eVersion $version) : Informer
    {
        if (!array_key_exists("$version", self::$instances)) {
            self::$instances["$version"] = new self($version);
        }

        return self::$instances["$version"];
    }

    /**
     * return option info for concrete option of concrete block
     * @param eSection $optionBlock
     * @param eOption $optionName
     * @return OptionInfo
     * @throws NotFoundException
     */
    public function getOptionInfo(eSection $optionBlock, eOption $optionName) : OptionInfo
    {
        if (!$this->isOptionInfoInit($optionBlock, $optionName)) {
            $this->makeOptionInfo($optionBlock, $optionName);
        }

        return $this->optionsInfo[(string) $optionBlock][(string) $optionName];
    }

    /**
     * check is known option for yaml documentation for concrete version
     * @param eSection $optionBlock
     * @param eOption $optionName
     * @return bool
     */
    public function isKnownOption(eSection $optionBlock, eOption $optionName)
    {
        return array_key_exists((string) $optionBlock, $this->documentation) &&
        array_key_exists((string) $optionName, $this->documentation[(string) $optionBlock]);
    }

    /**
     * Iterate via all option in documentation via option block type
     * @param eSection $optionBlock
     * @return OptionInfo[]
     * @throws UnknownValueException
     */
    public function iterateOptionInfo(eSection $optionBlock)
    {
        foreach ($this->documentation[(string) $optionBlock] as $optionName => $optionData) {
            switch ($optionBlock) {
                case eSection::SOURCE:
                    $optionName = eSourceOption::get($optionName);
                    yield $this->getOptionInfo($optionBlock, $optionName);
                    break;
                case eSection::INDEX:
                    $optionName = eIndexOption::get($optionName);
                    yield $this->getOptionInfo($optionBlock, $optionName);
                    break;
                case eSection::SEARCHD:
                    $optionName = eSearchdOption::get($optionName);
                    yield $this->getOptionInfo($optionBlock, $optionName);
                    break;
                case eSection::INDEXER:
                    $optionName = eIndexerOption::get($optionName);
                    yield $this->getOptionInfo($optionBlock, $optionName);
                    break;
                case eSection::COMMON:
                    $optionName = eCommonOption::get($optionName);
                    yield $this->getOptionInfo($optionBlock, $optionName);
                    break;
                default;
                    throw new UnknownValueException("{$optionBlock} is unknown value for iterating via options");
            }
        }
    }

    /**
     * Informer constructor.
     * Init informer for concrete sphinx version
     * @param eVersion $version
     * @throws NotFoundException
     */
    private function __construct(eVersion $version)
    {
        $this->version = $version;
        $this->loadDocumentation();
    }

    /**
     * check is option info object already init
     * @param eSection $optionBlock
     * @param eOption $optionName
     * @return bool
     */
    private function isOptionInfoInit(eSection $optionBlock, eOption $optionName) : bool
    {
        return array_key_exists((string) $optionBlock, $this->optionsInfo) &&
        array_key_exists((string) $optionName, $this->optionsInfo[(string) $optionBlock]);
    }

    /**
     * make option info object from plain data
     * @param eSection $optionBlock
     * @param eOption $optionName
     * @throws NotFoundException
     */
    private function makeOptionInfo(eSection $optionBlock, eOption $optionName)
    {
        if (!$this->isKnownOption($optionBlock, $optionName)) {
            throw new NotFoundException("For version {$this->version} {$optionName} is unknown option");
        }
        $info_data = $this->documentation[(string) $optionBlock][(string) $optionName];

        $optionInfo = new OptionInfo(
            $optionName,
            $optionBlock,
            $this->version,
            $info_data["description"],
            $info_data["multi_value"],
            $info_data["link"]
        );

        $this->optionsInfo[(string) $optionBlock][(string) $optionName] = $optionInfo;
    }

    /**
     * loads configuration from yaml files and save as array
     * @throws NotFoundException
     */
    private function loadDocumentation()
    {
        $path = $this->getDocumentationFilePath();

        if (!$this->isDocumentationExists()) {
            throw new NotFoundException("For version {$this->version} there are no file: {$path}");
        }

        $documentation = (new Parser())->parse(file_get_contents($path));

        if (!is_array($documentation)) {
            throw new YamlParseException("Failed to parse yaml file {$path}");
        }

        $this->documentation = $documentation;
    }

    /**
     * check is documentation yaml file exists
     * @return bool
     */
    private function isDocumentationExists() : bool
    {
        return is_file($this->getDocumentationFilePath());
    }

    /**
     * path to yaml sphinx documentation
     * @return string
     */
    private function getDocumentationDirectoryPath() : string
    {
        return realpath(__DIR__ . "/../../../../sphinx/docs");
    }

    /**
     * path to yaml sphinx documentation file
     * @return string
     */
    private function getDocumentationFilePath() : string
    {
        return $this->getDocumentationDirectoryPath() . "/documentation_{$this->version}.yaml";
    }

    /**
     * @var Informer[]
     */
    private static $instances = [];

    /**
     * @var eVersion
     */
    private $version;

    /**
     * @var array
     */
    private $documentation;

    /**
     * @var array
     */
    private $optionsInfo = [];
}