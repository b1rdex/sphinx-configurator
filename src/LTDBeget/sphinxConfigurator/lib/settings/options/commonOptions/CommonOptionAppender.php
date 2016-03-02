<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 7:47 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions;


use LTDBeget\sphinxConfigurator\lib\CommonSettings;

/**
 * Class CommonOptionAppender
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions
 */
class CommonOptionAppender
{
    /**
     * @var CommonSettings
     */
    private $commonSettings;

    /**
     * CommonOptionAppender constructor.
     * @param CommonSettings $commonSettings
     */
    public function __construct(CommonSettings $commonSettings)
    {
        $this->commonSettings = $commonSettings;
    }

    /**
     * @return CommonSettings
     */
    public function getCommon() : CommonSettings
    {
        return $this->commonSettings;
    }
}