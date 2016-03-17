<?php
/**
 * @author: Viskov Sergey
 * @date: 17.03.16
 * @time: 23:41
 */

namespace LTDBeget\dev;


use LTDBeget\sphinx\enums\eVersion;
use Symfony\Component\Yaml\Parser;

/**
 * Class EnumGenerator
 * @package LTDBeget\dev
 */
final class EnumGenerator
{

    protected $fileContents  = [];
    protected $documentation = [];

    public function __construct()
    {
        $this->prepareDocumentation();
        $this->prepareContents();
        $this->writeFiles();
    }

    /**
     * parse and prepare info from docks
     */
    private function prepareDocumentation()
    {
        foreach (eVersion::getConstants() as $cons => $version) {
            $eVersion      = eVersion::get($version);
            $documentation = $this->getDocumentation($eVersion);
            $this->processDocumentation($documentation);
        }
        $this->removeDuplicates();
    }


    private function writeFiles()
    {
        foreach ($this->fileContents as $fileName => $fileContent) {
            $name = $this->getOutputDir() . DIRECTORY_SEPARATOR . $fileName;
            file_put_contents($name, $fileContent);
        }
    }

    /**
     * make enum file contents
     */
    private function prepareContents()
    {
        foreach ($this->documentation as $section => $options) {
            $Section    = ucfirst($section);
            $class_name = "e{$Section}Option";

            $methods   = [];
            $constants = [];
            foreach ($options as $option) {
                $method    = " * @method static {{CLASS_NAME}} {{CONST}}()";
                $method    = str_replace("{{CLASS_NAME}}", $class_name, $method);
                $method    = str_replace("{{CONST}}", strtoupper($option), $method);
                $methods[] = $method;

                $const       = '    const {{CONST}} = "{{OPTION_NAME}}";';
                $const       = str_replace("{{OPTION_NAME}}", $option, $const);
                $const       = str_replace("{{CONST}}", strtoupper($option), $const);
                $constants[] = $const;
            }
            $methods   = implode("\n", $methods);
            $constants = implode("\n", $constants);
            $template  = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "enum");
            $template  = str_replace("{{CLASS_NAME}}", $class_name, $template);
            $template  = str_replace("{{MAGIC_METHODS}}", $methods, $template);
            $template  = str_replace("{{CONSTANTS}}", $constants, $template);

            $this->fileContents[$class_name . ".php"] = $template;
        }

    }

    /**
     * save names from documentation to this documentation
     * @param array $documentation
     */
    private function processDocumentation(array $documentation)
    {
        foreach ($documentation as $section => $options) {
            if (!array_key_exists($section, $this->documentation)) {
                $this->documentation[$section] = [];
            }

            foreach ($options as $optionName => $option) {
                $this->documentation[$section][] = $optionName;
            }
        }
    }

    /**
     * remove duplicates options names
     */
    private function removeDuplicates()
    {
        foreach ($this->documentation as $section => $options) {
            $this->documentation[$section] = array_values(array_unique($options));
        }

    }

    /**
     * @param eVersion $version
     * @return array
     */
    private function getDocumentation(eVersion $version) : array
    {
        $documentation = (new Parser())->parse(file_get_contents($this->getFileName($version)));

        return is_array($documentation) ? $documentation : [];
    }

    /**
     * name of file for save parsed data
     * @param eVersion $version
     * @return string
     */
    private function getFileName(eVersion $version) : string
    {
        return $this->getPath() . "/documentation_{$version}.yaml";
    }

    /**
     * name of directory where needs to save parsed data
     * @return string
     */
    private function getPath() : string
    {
        return realpath(__DIR__ . "/../../../sphinx/docs");
    }

    /**
     * get path to output dir
     * @return string
     */
    private function getOutputDir()
    {
        return realpath(__DIR__ . "/../sphinx/enums/options");
    }

}