<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 7:47 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions;


use LTDBeget\sphinxConfigurator\lib\CommonSettings;
use LTDBeget\sphinxConfigurator\lib\Option;

/**
 * Class CommonOption
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions
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
        $this->value = $value;
        $this->commonSettings = $commonSettings;
    }

    /**
     * @return CommonSettings
     */
    public function getCommonSettings() : CommonSettings
    {
        return $this->commonSettings;
    }
}