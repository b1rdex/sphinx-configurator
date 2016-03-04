<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class StopwordsUnstemmed
 *
 * whether to apply stopwords before or after stemming
 * optional, default is 0 (apply stopwords after stemming)
 * 
 * stopwords_unstemmed	= 0
 *
 * @package LTDBeget\sphinxConfigurator\lib\definitions\options\indexOptions\concreteOptions
 */
class StopwordsUnstemmed extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}