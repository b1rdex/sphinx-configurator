<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 8:02 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\IndexerOption;

/**
 * Class MaxXmlpipe2Field
 *
 * maximum xmlpipe2 field length, bytes
 * optional, default is 2M
 *
 * max_xmlpipe2_field    = 4M
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\concreteOptions
 */
class MaxXmlpipe2Field extends IndexerOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}