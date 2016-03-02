<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 5:06 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions;


use LTDBeget\sphinxConfigurator\exceptions\NotFoundException;
use LTDBeget\sphinxConfigurator\exceptions\WrongContextException;
use LTDBeget\sphinxConfigurator\lib\Definition;
use LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\IndexOption;
use LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\IndexOptionAppender;

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
        $this->options[] = $option;

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
            yield $option;
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