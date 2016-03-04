<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class Morphology
 *
 * a list of morphology preprocessors to apply
 * optional, default is empty
 * 
 * builtin preprocessors are 'none', 'stem_en', 'stem_ru', 'stem_enru',
 * 'soundex', and 'metaphone'; additional preprocessors available from
 * libstemmer are 'libstemmer_XXX', where XXX is algorithm code
 * (see libstemmer_c/libstemmer/modules.txt)
 * 
 * morphology		= stem_en, stem_ru, soundex
 * morphology		= libstemmer_german
 * morphology		= libstemmer_sv
 * morphology		= none
 *
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions
 */
class Morphology extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}