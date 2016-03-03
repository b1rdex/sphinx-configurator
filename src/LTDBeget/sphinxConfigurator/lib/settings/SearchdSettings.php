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
        $this->options[] = $option;

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