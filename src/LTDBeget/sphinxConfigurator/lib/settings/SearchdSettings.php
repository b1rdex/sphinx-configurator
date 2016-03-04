<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 7:44 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings;


use LTDBeget\sphinxConfigurator\exceptions\WrongContextException;
use LTDBeget\sphinxConfigurator\lib\Settings;
use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;
use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOptionAppender;

class SearchdSettings extends Settings
{
    /**
     * @var SearchdOptionAppender
     */
    private $optionAppender = null;

    /**
     * @var SearchdOption[]
     */
    private $options = [];

    /**
     * @param SearchdOption $option
     * @return SearchdSettings
     * @throws WrongContextException
     */
    public function addOption(SearchdOption $option) : SearchdSettings
    {
        if($option->getSearchd() !== $this) {
            throw new WrongContextException("Trying to add option with wrong context");
        }

        if($option->isMultiValue()) {
            if(! array_key_exists($option->getName(), $this->options)) {
                $this->options[$option->getName()] = [];
            }

            $this->options[$option->getName()][] = $option;
        } else {
            $this->options[$option->getName()] = $option;
        }

        return $this;
    }

    /**
     * @return SearchdOptionAppender
     */
    public function getOptionAppender() : SearchdOptionAppender
    {
        if(is_null($this->optionAppender)) {
            $this->optionAppender = new SearchdOptionAppender($this);
        }

        return $this->optionAppender;
    }

    /**
     * @return SearchdOption[]
     */
    public function iterateOptions()
    {
        foreach($this->options as $option) {
            if($option instanceof SearchdOption) {
                if($option->isDeleted()) {
                    continue;
                }
                yield $option;
            }
            if(is_array($option)) {
                foreach($option as $multiOption) {
                    /**
                     * @var SearchdOption $multiOption
                     */
                    if($multiOption->isDeleted()) {
                        continue;
                    }
                    yield $multiOption;
                }
            }
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