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
use LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\SourceOption;
use LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\SourceOptionAppender;

/**
 * Class SourceDefinition
 * @package LTDBeget\sphinxConfigurator\lib\definitions
 */
class SourceDefinition extends Definition
{
    /**
     * @var SourceOptionAppender
     */
    private $optionAppender;

    /**
     * @var SourceOption[]
     */
    private $options = [];

    /**
     * @return SourceOptionAppender
     */
    public function getOptionAppender() : SourceOptionAppender
    {
        if(is_null($this->optionAppender)) {
            $this->optionAppender = new SourceOptionAppender($this);
        }

        return $this->optionAppender;
    }

    /**
     * @param SourceOption $option
     * @return SourceDefinition
     * @throws WrongContextException
     */
    public function addOption(SourceOption $option) : SourceDefinition
    {
        if($option->getSource() !== $this) {
            throw new WrongContextException("Trying to add option with wrong context");
        }
        $this->options[] = $option;

        return $this;
    }

    /**
     * @return SourceOption[]
     */
    public function iterateOptions()
    {
        foreach($this->options as $option) {
            yield $option;
        }
    }

    /**
     * @return SourceDefinition
     * @throws NotFoundException
     */
    public function getInheritanceSource() : SourceDefinition
    {
        foreach($this->getConfiguration()->iterateSource() as $source) {
            if($source->getName() === $this->getInheritanceName()) {
                return $source;
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