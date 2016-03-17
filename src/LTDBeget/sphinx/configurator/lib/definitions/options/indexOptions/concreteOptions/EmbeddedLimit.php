<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class EmbeddedLimit
 *
 * embedded file size limit
 * optional, default is 16K
 *
 * exceptions, wordforms, and stopwords files smaller than this limit
 * are stored in the index; otherwise, their paths and sizes are stored
 *
 * embedded_limit        = 16K
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class EmbeddedLimit extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}