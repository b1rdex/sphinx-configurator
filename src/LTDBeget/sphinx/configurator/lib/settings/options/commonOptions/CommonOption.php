<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 7:47 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\commonOptions;


use LTDBeget\sphinx\configurator\lib\Option;
use LTDBeget\sphinx\configurator\lib\settings\CommonSettings;

/**
 * Class CommonOption
 * @package LTDBeget\sphinx\configurator\lib\settings\options\commonOptions
 */
abstract class CommonOption extends Option
{
    /**
     * @var CommonSettings
     */
    private $commonSettings;

    /**
     * CommonOption constructor.
     * @param CommonSettings $commonSettings
     * @param string $value
     */
    public function __construct(CommonSettings $commonSettings, string $value)
    {
        $this->value          = $value;
        $this->commonSettings = $commonSettings;
    }

    /**
     * Common settings has no multi-value options
     * @return bool
     */
    final public function isMultiValue() : bool
    {
        return false;
    }

    /**
     * @return CommonSettings
     */
    public function getCommon() : CommonSettings
    {
        return $this->commonSettings;
    }
}