<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 6:37 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\IndexDefinition;
use LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions\Source;

class IndexOptionAppender
{
    /**
     * @var IndexDefinition
     */
    private $indexDefinition;

    public function __construct(IndexDefinition $indexDefinition)
    {
        $this->indexDefinition = $indexDefinition;
    }

    /**
     * @return IndexDefinition
     */
    public function getIndex() : IndexDefinition
    {
        return $this->indexDefinition;
    }

    /**
     * @param string $value
     * @return IndexOption
     * @throws \LTDBeget\sphinxConfigurator\exceptions\WrongContextException
     */
    public function addType(string $value) : IndexOption
    {
        $option = new Source($this->getIndex(), $value);
        $this->getIndex()->addOption($option);

        return $option;
    }
}