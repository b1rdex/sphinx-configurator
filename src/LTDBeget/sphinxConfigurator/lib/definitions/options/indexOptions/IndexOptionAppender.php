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
     * IndexOptionAppender constructor.
     * @param IndexDefinition $indexDefinition
     */
    public function __construct(IndexDefinition $indexDefinition)
    {
        $this->indexDefinition = $indexDefinition;
    }

    /**
     * @param string $value
     * @return IndexOption
     * @throws \LTDBeget\sphinxConfigurator\exceptions\WrongContextException
     */
    public function addSource(string $value) : IndexOption
    {
        $option = new Source($this->getIndex(), $value);
        $this->getIndex()->addOption($option);

        return $option;
    }

    /**
     * @var IndexDefinition
     */
    private $indexDefinition;

    /**
     * @return IndexDefinition
     */
    private function getIndex() : IndexDefinition
    {
        return $this->indexDefinition;
    }
}