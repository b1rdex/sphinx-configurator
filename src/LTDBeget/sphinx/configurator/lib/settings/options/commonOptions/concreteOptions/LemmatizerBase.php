<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:31 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\CommonOption;

/**
 * Class LemmatizerBase
 *
 * lemmatizer dictionaries base path
 * optional, default is /usr/local/share (see ./configure --datadir)
 *
 * lemmatizer_base = /usr/local/share/sphinx/dicts
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\concreteOptions
 */
class LemmatizerBase extends CommonOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}