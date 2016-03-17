<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 6:36 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions;


use LTDBeget\sphinx\configurator\lib\definitions\IndexDefinition;
use LTDBeget\sphinx\configurator\lib\Option;

abstract class IndexOption extends Option
{
    /**
     * @var IndexDefinition
     */
    private $indexDefinition;

    /**
     * IndexOption constructor.
     * @param IndexDefinition $indexDefinition
     * @param string $value
     */
    public function __construct(IndexDefinition $indexDefinition, string $value)
    {
        $this->value           = $value;
        $this->indexDefinition = $indexDefinition;
    }

    /**
     * @return IndexDefinition
     */
    public function getIndex() : IndexDefinition
    {
        return $this->indexDefinition;
    }
}