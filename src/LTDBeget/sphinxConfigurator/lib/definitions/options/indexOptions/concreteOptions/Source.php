<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 6:44 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class Source
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions
 */
class Source extends IndexOption
{
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