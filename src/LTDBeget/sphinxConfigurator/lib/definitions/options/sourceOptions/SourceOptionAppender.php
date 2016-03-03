<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 5:07 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions;


use LTDBeget\sphinxConfigurator\exceptions\ValidationException;
use LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions\concreteOptions\Type;
use LTDBeget\sphinxConfigurator\lib\definitions\SourceDefinition;

/**
 * Class SourceOptionAppender
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\sourceOptions
 */
class SourceOptionAppender
{
    /**
     * @param SourceDefinition $sourceDefinition
     */
    public function __construct(SourceDefinition $sourceDefinition)
    {
        $this->sourceDefinition = $sourceDefinition;
    }

    /**
     * @param string $value
     * @return SourceOption
     * @throws ValidationException
     */
    public function addType(string $value) : SourceOption
    {
        $option = new Type($this->getSource(), $value);
        $this->getSource()->addOption($option);

        return $option;
    }

    /**
     * @var SourceDefinition
     */
    private $sourceDefinition;

    /**
     * @return SourceDefinition
     */
    private function getSource() : SourceDefinition
    {
        return $this->sourceDefinition;
    }
}