<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 5:06 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions;


use LTDBeget\sphinx\configurator\lib\Option;
use LTDBeget\sphinx\configurator\lib\definitions\SourceDefinition;

/**
 * Class SourceOption
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions
 */
abstract class SourceOption extends Option
{
    /**
     * @var SourceDefinition
     */
    private $sourceDefinition;

    /**
     * @param SourceDefinition $sourceDefinition
     * @param string $value
     */
    public function __construct(SourceDefinition $sourceDefinition, string $value)
    {
        $this->sourceDefinition = $sourceDefinition;
        $this->value = $value;
    }

    /**
     * @return SourceDefinition
     */
    public function getSource() : SourceDefinition
    {
        return $this->sourceDefinition;
    }
}