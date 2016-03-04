<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class Source
 *
 * document source(s) to index
 * multi-value, mandatory
 * document IDs must be globally unique across all sources
 * source			= src1
 *
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions
 */
class Source extends IndexOption
{
    /**
     * @return bool
     */
    public function isMultiValue() : bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function validate() : bool
    {
        foreach($this->getIndex()->getConfiguration()->iterateSource() as $source) {
            if($source->getName() === $this->getValue()) {
                return true;
            }
        }

        return false;
    }
}