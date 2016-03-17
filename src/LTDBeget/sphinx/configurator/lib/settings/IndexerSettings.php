<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 7:43 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings;


use LTDBeget\sphinx\configurator\exceptions\WrongContextException;
use LTDBeget\sphinx\configurator\lib\Settings;
use LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\IndexerOption;
use LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\IndexerOptionAppender;

/**
 * Class IndexerSettings
 * @package LTDBeget\sphinx\configurator\lib
 */
class IndexerSettings extends Settings
{
    /**
     * @var IndexerOptionAppender
     */
    private $optionAppender = null;

    /**
     * @var IndexerOption[]
     */
    private $options = [];

    /**
     * @param IndexerOption $option
     * @return IndexerSettings
     * @throws WrongContextException
     */
    public function addOption(IndexerOption $option) : IndexerSettings
    {
        if ($option->getIndexer() !== $this) {
            throw new WrongContextException("Trying to add option with wrong context");
        }
        $this->options[$option->getName()] = $option;

        return $this;
    }

    /**
     * @return IndexerOptionAppender
     */
    public function getOptionAppender() : IndexerOptionAppender
    {
        if (is_null($this->optionAppender)) {
            $this->optionAppender = new IndexerOptionAppender($this);
        }

        return $this->optionAppender;
    }

    /**
     * @return IndexerOption[]
     */
    public function iterateOptions()
    {
        foreach ($this->options as $option) {
            if ($option->isDeleted()) {
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
        foreach ($this->iterateOptions() as $option) {
            if (!$option->validate()) {
                return false;
            }
        }

        return true;
    }
}