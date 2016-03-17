<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 5:06 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions;


use LTDBeget\sphinx\configurator\exceptions\NotFoundException;
use LTDBeget\sphinx\configurator\exceptions\WrongContextException;
use LTDBeget\sphinx\configurator\lib\Definition;
use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;
use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOptionAppender;

class IndexDefinition extends Definition
{
    /**
     * @var IndexOptionAppender
     */
    private $optionAppender = null;

    /**
     * @var IndexOption[]
     */
    private $options = [];

    /**
     * @param IndexOption $option
     * @return IndexDefinition
     * @throws WrongContextException
     */
    public function addOption(IndexOption $option) : IndexDefinition
    {
        if($option->getIndex() !== $this) {
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
     * @return IndexOptionAppender
     */
    public function getOptionAppender() : IndexOptionAppender
    {
        if(is_null($this->optionAppender)) {
            $this->optionAppender = new IndexOptionAppender($this);
        }

        return $this->optionAppender;
    }

    /**
     * @return IndexOption[]
     */
    public function iterateOptions()
    {
        foreach($this->options as $option) {
            if($option instanceof IndexOption) {
                if($option->isDeleted()) {
                    continue;
                }
                yield $option;
            }
            if(is_array($option)) {
                foreach($option as $multiOption) {
                    /**
                     * @var IndexOption $multiOption
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
     * @return IndexDefinition
     * @throws NotFoundException
     */
    public function getInheritanceIndex() : IndexDefinition
    {
        foreach($this->getConfiguration()->iterateIndex() as $index) {
            if($index->getName() === $this->getInheritanceName()) {
                return $index;
            }
        }

        throw new NotFoundException("There are no Source definition with name {$this->getInheritanceName()} in configuration file");
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