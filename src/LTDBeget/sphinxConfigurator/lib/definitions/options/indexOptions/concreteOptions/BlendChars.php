<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class BlendChars
 *
 * blended characters list
 * blended chars are indexed both as separators and valid characters
 * for instance, AT&T will results in 3 tokens ("at", "t", and "at&t")
 * optional, default is empty
 * 
 * blend_chars		= +, &, U+23
 *
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions
 */
class BlendChars extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}