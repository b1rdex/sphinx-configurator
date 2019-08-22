<?php
/**
 * @author: Viskov Sergey
 * @date  : 3/17/16
 * @time  : 1:22 PM
 */

namespace LTDBeget\sphinx\informer;

use LTDBeget\sphinx\enums\base\eOption;
use LTDBeget\sphinx\enums\eSection;
use LTDBeget\sphinx\enums\eVersion;
use LTDBeget\sphinx\informer\exceptions\DocumentationSourceException;
use LTDBeget\sphinx\informer\exceptions\InformerRuntimeException;
use Symfony\Component\Yaml\Parser;

/**
 * Class Informer
 * Class for manipulating with options info
 *
 * @package LTDBeget\sphinx\informer
 */
final class Informer
{
    /**
     * Get informer for concrete version, and init if did not init yet
     *
     * @param eVersion $version
     *
     * @return Informer
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     * @throws \LTDBeget\sphinx\informer\exceptions\DocumentationSourceException
     */
    public static function get(eVersion $version) : Informer
    {
        if (!array_key_exists("$version", self::$instances)) {
            self::$instances["$version"] = new self($version);
        }

        return self::$instances["$version"];
    }

    /**
     * return option info for concrete option of concrete section
     *
     * @param eSection $section
     * @param eOption  $optionName
     *
     * @return OptionInfo
     * @throws \LTDBeget\sphinx\informer\exceptions\InformerRuntimeException
     */
    public function getOptionInfo(eSection $section, eOption $optionName) : OptionInfo
    {
        if (!$this->isOptionInfoInit($section, $optionName)) {
            $this->makeOptionInfo($section, $optionName);
        }

        return $this->optionsInfo[(string) $section][(string) $optionName];
    }

    /**
     * check is known option for yaml documentation for concrete version
     *
     * @param eSection $section
     * @param eOption  $optionName
     *
     * @return bool
     */
    public function isKnownOption(eSection $section, eOption $optionName)
    {
        return array_key_exists((string) $section, $this->documentation) &&
        array_key_exists((string) $optionName, $this->documentation[(string) $section]);
    }

    /**
     * checks is this option was permanently removed in newer sphinx version
     *
     * @param eSection $section
     * @param eOption  $optionName
     *
     * @return bool
     */
    public function isRemovedOption(eSection $section, eOption $optionName)
    {
        return array_key_exists((string) $section, $this->removedOptions) &&
        array_key_exists((string) $optionName, $this->removedOptions[(string) $section]);
    }

    /**
     * Is this section exists in current sphinx version
     *
     * @param eSection $section
     *
     * @return bool
     */
    public function isSectionExist(eSection $section) : bool
    {
        return !$section->is(eSection::COMMON) || !version_compare((string) $this->version, eVersion::V_2_2_1, '<');
    }

    /**
     * Iterate via all option in documentation via option section type
     *
     * @param eSection $section
     *
     * @return OptionInfo[]
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \LTDBeget\sphinx\informer\exceptions\InformerRuntimeException
     */
    public function iterateOptionInfo(eSection $section)
    {
        if (!$this->isSectionExist($section)) {
            throw new InformerRuntimeException("Sphinx of version {$this->version} does't have section {$section}");
        }

        foreach ($this->documentation[(string) $section] as $optionName => $optionData) {
            yield $this->getOptionInfo($section, $this->getOptionName($section, $optionName));
        }
    }

    /**
     * Get enum for given section and string name
     *
     * @internal
     *
     * @param eSection $section
     * @param string   $optionName
     *
     * @return eOption
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    private function getOptionName(eSection $section, string $optionName) : eOption
    {
        $enumClassName = "LTDBeget\\sphinx\\enums\\options\\e" . ucfirst((string) $section) . 'Option';

        /**
         * @var eOption $enumClassName
         */
        return $enumClassName::get($optionName);
    }

    /**
     * Informer constructor.
     * Init informer for concrete sphinx version
     *
     * @param eVersion $version
     *
     * @throws \LTDBeget\sphinx\informer\exceptions\DocumentationSourceException
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     */
    private function __construct(eVersion $version)
    {
        $this->version = $version;
        $this->loadDocumentation();
        $this->loadRemovedList();
    }

    /**
     * check is option info object already init
     *
     * @param eSection $section
     * @param eOption  $optionName
     *
     * @return bool
     */
    private function isOptionInfoInit(eSection $section, eOption $optionName) : bool
    {
        return array_key_exists((string) $section, $this->optionsInfo) &&
        array_key_exists((string) $optionName, $this->optionsInfo[(string) $section]);
    }

    /**
     * make option info object from plain data
     *
     * @param eSection $section
     * @param eOption  $optionName
     *
     * @throws \LTDBeget\sphinx\informer\exceptions\InformerRuntimeException
     */
    private function makeOptionInfo(eSection $section, eOption $optionName)
    {
        $this->checkOptionInfoAvailability($section, $optionName);

        $info_data = $this->documentation[(string) $section][(string) $optionName];

        $optionInfo = new OptionInfo(
            $optionName,
            $section,
            $this->version,
            $info_data['description'],
            $info_data['multi_value'],
            $info_data['link']
        );

        $this->optionsInfo[(string) $section][(string) $optionName] = $optionInfo;
    }

    /**
     * Check is option info available for this version
     *
     * @param eSection $section
     * @param eOption  $optionName
     *
     * @throws \LTDBeget\sphinx\informer\exceptions\InformerRuntimeException
     */
    private function checkOptionInfoAvailability(eSection $section, eOption $optionName)
    {
        if (!$this->isSectionExist($section)) {
            throw new InformerRuntimeException("Sphinx v.{$this->version} does't have section `{$section}`");
        }

        if (!$this->isKnownOption($section, $optionName)) {
            throw new InformerRuntimeException("Sphinx v.{$this->version} option {$optionName} in `{$section}` isn't available");
        }

        if ($this->isRemovedOption($section, $optionName)) {
            throw new InformerRuntimeException("Sphinx v.{$this->version} option {$optionName} in `{$section}` is permanently removed");
        }
    }

    /**
     * load to object info about permanently removed options
     *
     * @throws \LTDBeget\sphinx\informer\exceptions\DocumentationSourceException
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     */
    private function loadRemovedList()
    {
        $path = $this->getRemovedListFilePath();

        if ($this->isRemovedListFileExists()) {
            /** @noinspection PhpUndefinedClassInspection */
            $removed_list = (new Parser())->parse(file_get_contents($path));

            if (!is_array($removed_list)) {
                throw new DocumentationSourceException("Failed to parse yaml file {$path}");
            }

            $this->removedOptions = $removed_list;
        }
    }

    /**
     * loads configuration from yaml files and save as array
     *
     * @throws \LTDBeget\sphinx\informer\exceptions\DocumentationSourceException
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     */
    private function loadDocumentation()
    {
        $path = $this->getDocumentationFilePath();

        if (!$this->isDocumentationExists()) {
            throw new DocumentationSourceException("For version {$this->version} there are no file: {$path}");
        }

        /** @noinspection PhpUndefinedClassInspection */
        $documentation = (new Parser())->parse(file_get_contents($path));

        if (!is_array($documentation)) {
            throw new DocumentationSourceException("Failed to parse yaml file {$path}");
        }

        $this->documentation = $documentation;
    }

    /**
     * check is documentation yaml file exists
     *
     * @return bool
     */
    private function isDocumentationExists() : bool
    {
        return is_file($this->getDocumentationFilePath());
    }

    /**
     * path to yaml sphinx documentation
     *
     * @return string
     */
    private function getDocumentationDirectoryPath() : string
    {
        return __DIR__ . '/../../../../sphinx/docs';
    }

    /**
     * path to yaml sphinx documentation file
     *
     * @return string
     */
    private function getDocumentationFilePath() : string
    {
        return $this->getDocumentationDirectoryPath() . "/documentation_{$this->version}.yaml";
    }

    /**
     * Return path to file with removed options list
     *
     * @return string
     */
    private function getRemovedListFilePath() : string
    {
        return $this->getDocumentationDirectoryPath() . "/permanently_removed_options_{$this->version}.yaml";
    }

    /**
     * Is file with removed options list exists
     *
     * @return bool
     */
    private function isRemovedListFileExists() : bool
    {
        return is_file($this->getRemovedListFilePath());
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
    private $removedOptions = [];

    /**
     * @var array
     */
    private $optionsInfo = [];
}