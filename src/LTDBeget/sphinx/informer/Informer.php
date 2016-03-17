<?php
/**
 * @author: Viskov Sergey
 * @date: 3/17/16
 * @time: 1:22 PM
 */

namespace LTDBeget\sphinx\informer;



use LTDBeget\sphinx\informer\enums\blocks\eDefinition;
use LTDBeget\sphinx\informer\enums\blocks\eOptionsBlock;
use LTDBeget\sphinx\informer\enums\blocks\eSettings;
use LTDBeget\sphinx\informer\enums\eSphinxVersion;
use LTDBeget\sphinx\informer\enums\options\eCommonOption;
use LTDBeget\sphinx\informer\enums\options\eIndexerOption;
use LTDBeget\sphinx\informer\enums\options\eIndexOption;
use LTDBeget\sphinx\informer\enums\options\eOption;
use LTDBeget\sphinx\informer\enums\options\eSearchdOption;
use LTDBeget\sphinx\informer\enums\options\eSourceOption;
use LTDBeget\sphinx\informer\exceptions\NotFoundException;
use LTDBeget\sphinx\informer\exceptions\UnknownValueException;
use Symfony\Component\Yaml\Parser;

/**
 * Class Informer
 * @package LTDBeget\sphinx\informer
 */
final class Informer
{
    /**
     * Get informer for concrete version, and init if did not init yet
     * @param eSphinxVersion $version
     * @return Informer
     */
    public static function get(eSphinxVersion $version) : Informer
    {
        if(!array_key_exists("$version", self::$instances)) {
            self::$instances["$version"] = new self($version);
        }

        return self::$instances["$version"];
    }

    /**
     * Get known source option info if known
     * @param eSourceOption $optionName
     * @return OptionInfo
     * @throws NotFoundException
     */
    public function getSourceOption(eSourceOption $optionName)
    {
        return $this->getOptionInfo(eDefinition::SOURCE(), $optionName);
    }

    /**
     * is known source definition option name
     * @param eSourceOption $optionName
     * @return bool
     */
    public function isKnownSourceOption(eSourceOption $optionName)
    {
        return $this->isKnownOption(eDefinition::SOURCE(), $optionName);
    }

    /**
     * @return OptionInfo[]
     */
    public function iterateSourceOptionInfo()
    {
        return $this->iterateOptionInfo(eDefinition::SOURCE());
    }

    /**
     * Informer constructor.
     * Init informer for concrete sphinx version
     * @param eSphinxVersion $version
     * @throws NotFoundException
     */
    private function __construct(eSphinxVersion $version)
    {
        $this->version = $version;
        $this->loadDocumentation();
    }

    /**
     * return option info for concrete option of concrete block
     * @param eOptionsBlock $optionBlock
     * @param eOption $optionName
     * @return OptionInfo
     * @throws NotFoundException
     */
    private function getOptionInfo(eOptionsBlock $optionBlock, eOption $optionName) : OptionInfo
    {
        if(! $this->isOptionInfoInit($optionBlock, $optionName)) {
            $this->makeOptionInfo($optionBlock, $optionName);
        }

        return $this->optionsInfo[(string) $optionBlock][(string) $optionName];
    }

    /**
     * check is option info object already init
     * @param eOptionsBlock $optionBlock
     * @param eOption $optionName
     * @return bool
     */
    private function isOptionInfoInit(eOptionsBlock $optionBlock,eOption $optionName) : bool
    {
        return array_key_exists((string) $optionBlock, $this->optionsInfo) &&
               array_key_exists((string) $optionName, $this->optionsInfo[(string) $optionBlock]);
    }

    /**
     * make option info object from plain data
     * @param eOptionsBlock $optionBlock
     * @param eOption $optionName
     * @throws NotFoundException
     */
    private function makeOptionInfo(eOptionsBlock $optionBlock,eOption $optionName)
    {
        if(! $this->isKnownOption($optionBlock, $optionName)) {
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
     * check is known option for yaml documentation for concrete version
     * @param eOptionsBlock $optionBlock
     * @param eOption $optionName
     * @return bool
     */
    private function isKnownOption(eOptionsBlock $optionBlock,eOption $optionName)
    {
        return array_key_exists((string) $optionBlock, $this->documentation) &&
               array_key_exists((string) $optionName, $this->documentation[(string) $optionBlock]);
    }

    /**
     * Iterate via all option in documentation via option block type
     * @param eOptionsBlock $optionBlock
     * @return OptionInfo[]
     * @throws UnknownValueException
     */
    private function iterateOptionInfo(eOptionsBlock $optionBlock)
    {
        foreach($this->documentation[(string) $optionBlock] as $optionName => $optionData) {
            switch($optionBlock) {
                case eDefinition::SOURCE:
                    $optionName =  eSourceOption::get($optionName);
                    yield $this->getOptionInfo($optionBlock, $optionName);
                    break;
                case eDefinition::INDEX:
                    $optionName = eIndexOption::get($optionName);
                    yield $this->getOptionInfo($optionBlock, $optionName);
                    break;
                case eSettings::SEARCHD:
                    $optionName = eSearchdOption::get($optionName);
                    yield $this->getOptionInfo($optionBlock, $optionName);
                    break;
                case eSettings::INDEXER:
                    $optionName = eIndexerOption::get($optionName);
                    yield $this->getOptionInfo($optionBlock, $optionName);
                    break;
                case eSettings::COMMON:
                    $optionName = eCommonOption::get($optionName);
                    yield $this->getOptionInfo($optionBlock, $optionName);
                    break;
                default;
                    throw new UnknownValueException("{$optionBlock} is unknown value for iterating via options");
            }
        }
    }

    /**
     * loads configuration from yaml files and save as array
     * @throws NotFoundException
     */
    private function loadDocumentation()
    {
        $path = $this->getDocumentationFilePath();

        if(! $this->isDocumentationExists()) {
            throw new NotFoundException("For version {$this->version} there are no file: {$path}");
        }

        $content = file_get_contents($path);
        $this->documentation = (new Parser())->parse($content);
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
        return realpath(__DIR__."/../../../../sphinx/docs");
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
     * @var eSphinxVersion
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