<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 7:47 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\commonOptions;


use LTDBeget\sphinx\configurator\exceptions\NotFoundException;
use LTDBeget\sphinx\configurator\lib\OptionAppender;
use LTDBeget\sphinx\configurator\lib\settings\CommonSettings;

/**
 * Class CommonOptionAppender
 * @package LTDBeget\sphinx\configurator\lib\settings\options\commonOptions
 *
 * @method CommonOption addJsonAutoconvKeynames(string $value)
 * @method CommonOption addJsonAutoconvNumbers(string $value)
 * @method CommonOption addLemmatizerBase(string $value)
 * @method CommonOption addOnJsonAttrError(string $value)
 * @method CommonOption addPluginDir(string $value)
 * @method CommonOption addRlpEnvironment(string $value)
 * @method CommonOption addRlpMaxBatchDocs(string $value)
 * @method CommonOption addRlpMaxBatchSize(string $value)
 * @method CommonOption addRlpRoot(string $value)
 *
 */
class CommonOptionAppender extends OptionAppender
{
    /**
     * CommonOptionAppender constructor.
     * @param CommonSettings $commonSettings
     */
    public function __construct(CommonSettings $commonSettings)
    {
        $this->commonSettings = $commonSettings;
    }

    /**
     * @param string $methodName
     * @param array $arguments
     * @return CommonOption
     * @throws NotFoundException
     */
    public function __call(string $methodName, array $arguments) : CommonOption
    {
        $optionClass = $this->getOptionClassByMethodName($methodName);

        /**
         * @var CommonOption $option
         */
        $option = new $optionClass($this->getCommon(), $arguments[0]);
        $this->getCommon()->addOption($option);

        return $option;
    }

    /**
     * @var CommonSettings
     */
    private $commonSettings;

    /**
     * @return CommonSettings
     */
    private function getCommon() : CommonSettings
    {
        return $this->commonSettings;
    }
}