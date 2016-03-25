<?php
/**
 * @author: Viskov Sergey
 * @date  : 22.03.16
 * @time  : 4:26
 */

namespace LTDBeget\dev;

use LTDBeget\sphinx\enums\eSection;
use LTDBeget\sphinx\enums\eVersion;
use LTDBeget\sphinx\informer\Informer;
use Symfony\Component\Yaml\Dumper;

/**
 * Class PermanentlyRemovedGenerator
 *
 * @package LTDBeget\dev
 */
class PermanentlyRemovedGenerator
{
    /**
     * PermanentlyRemovedGenerator constructor.
     *
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     * @throws \LogicException
     * @throws \LTDBeget\sphinx\informer\exceptions\InformerRuntimeException
     * @throws \LTDBeget\sphinx\informer\exceptions\DocumentationSourceException
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        $versions = array_reverse(eVersion::getConstants());

        foreach ($versions as $version) {
            /** @noinspection DisconnectedForeachInstructionInspection */
            array_shift($versions);
            $version = eVersion::get($version);
            $this->processVersion($version, $versions);
        }
    }

    /**
     * @param eVersion $targetVersion
     * @param array $versions
     *
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     * @throws \LogicException
     * @throws \LTDBeget\sphinx\informer\exceptions\InformerRuntimeException
     * @throws \LTDBeget\sphinx\informer\exceptions\DocumentationSourceException
     * @throws \InvalidArgumentException
     */
    private function processVersion(eVersion $targetVersion, array $versions)
    {
        $informer = Informer::get($targetVersion);
        $sections = eSection::getConstants();

        $all_permanently_removed = [];

        foreach ($sections as $section) {
            $section = eSection::get($section);
            if ($informer->isSectionExist($section)) {
                $removed = $this->getPermanentlyRemoved($section, $targetVersion, $versions);
                if (count($removed)) {
                    $all_permanently_removed[(string) $section] = $removed;
                }
            }
        }

        if (count($all_permanently_removed)) {
            $this->dump($targetVersion, $all_permanently_removed);
        }
    }

    /**
     * @param eSection $section
     * @param eVersion $targetVersion
     * @param array $versions
     *
     * @return array
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     * @throws \LogicException
     * @throws \LTDBeget\sphinx\informer\exceptions\InformerRuntimeException
     * @throws \LTDBeget\sphinx\informer\exceptions\DocumentationSourceException
     * @throws \InvalidArgumentException
     */
    private function getPermanentlyRemoved(eSection $section, eVersion $targetVersion, array $versions) : array
    {
        $target_version_options = $this->getVersionOptions($section, $targetVersion);

        $old_versions_options = [];
        foreach ($versions as $version) {
            /** @noinspection SlowArrayOperationsInLoopInspection */
            $old_versions_options = array_merge($this->getVersionOptions($section, eVersion::get($version)), $old_versions_options);
        }
        $old_versions_options = array_unique($old_versions_options);

        $options_intersect = array_intersect($target_version_options, $old_versions_options);

        $values = array_flip(array_values(array_diff($old_versions_options, $options_intersect)));
        array_walk($values, function (&$value) {
            $value = true;
        });

        return $values;
    }

    /**
     * @param eSection $section
     * @param eVersion $version
     *
     * @return array
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     * @throws \LTDBeget\sphinx\informer\exceptions\DocumentationSourceException
     * @throws \LogicException
     * @throws \LTDBeget\sphinx\informer\exceptions\InformerRuntimeException
     * @throws \InvalidArgumentException
     */
    private function getVersionOptions(eSection $section, eVersion $version) : array
    {
        $informer = Informer::get($version);
        $options  = [];

        if ($informer->isSectionExist($section)) {
            foreach ($informer->iterateOptionInfo($section) as $optionInfo) {
                $options[] = (string) $optionInfo->getName();
            }
        }

        return $options;
    }

    /**
     * save result as yaml file
     *
     * @param eVersion $version
     * @param array $options
     */
    private function dump(eVersion $version, array $options)
    {
        $dumper = new Dumper();

        $yaml = $dumper->dump($options, 4);

        $content = '';
        $content .= '# automatically generated from sphinx documentation' . PHP_EOL;
        $content .= "# version of documentation: {$version}" . PHP_EOL . PHP_EOL;
        $content .= $yaml;

        file_put_contents($this->getFileName($version), $content);
    }

    /**
     * name of file for save parsed data
     *
     * @param eVersion $version
     *
     * @return string
     */
    private function getFileName(eVersion $version) : string
    {
        return $this->getPath() . "/permanently_removed_options_{$version}.yaml";
    }

    /**
     * name of directory where needs to save parsed data
     *
     * @return string
     */
    private function getPath() : string
    {
        return __DIR__ . '/../../../sphinx/docs';
    }
}