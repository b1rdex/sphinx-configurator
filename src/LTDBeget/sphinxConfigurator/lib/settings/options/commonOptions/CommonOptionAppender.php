<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 7:47 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions;


use LTDBeget\sphinxConfigurator\exceptions\WrongContextException;
use LTDBeget\sphinxConfigurator\lib\settings\CommonSettings;
use LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions\concreteOptions\LemmatizerBase;

/**
 * Class CommonOptionAppender
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\commonOptions
 */
class CommonOptionAppender
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
     * @param $value
     * @return CommonOption
     * @throws WrongContextException
     */
    public function addLemmatizerBase($value) : CommonOption
    {
        $option = new LemmatizerBase($this->getCommon(), $value);
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