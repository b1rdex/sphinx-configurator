<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 7:44 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings;


use LTDBeget\sphinx\configurator\exceptions\WrongContextException;
use LTDBeget\sphinx\configurator\lib\Settings;
use LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\CommonOption;
use LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\CommonOptionAppender;

/**
 * Class CommonSettings
 * @package LTDBeget\sphinx\configurator\lib\settings
 */
class CommonSettings extends Settings
{
    /**
     * @var CommonOptionAppender
     */
    private $optionAppender = null;

    /**
     * @var CommonOption[]
     */
    private $options = [];

    /**
     * @param CommonOption $option
     * @return CommonSettings
     * @throws WrongContextException
     */
    public function addOption(CommonOption $option) : CommonSettings
    {
        if($option->getCommon() !== $this) {
            throw new WrongContextException("Trying to add option with wrong context");
        }
        $this->options[$option->getName()] = $option;

        return $this;
    }

    /**
     * @return CommonOptionAppender
     */
    public function getOptionAppender() : CommonOptionAppender
    {
        if(is_null($this->optionAppender)) {
            $this->optionAppender = new CommonOptionAppender($this);
        }

        return $this->optionAppender;
    }

    /**
     * @return CommonOption[]
     */
    public function iterateOptions()
    {
        foreach($this->options as $option) {
            if($option->isDeleted()) {
                continue;
            }

            yield $option;
        }
    }

    /**
     * @return bool
     */
    public function validate() : bool
    {
        foreach($this->iterateOptions() as $option) {
            if(! $option->validate()) {
                return false;
            }
        }

        return true;
    }
}