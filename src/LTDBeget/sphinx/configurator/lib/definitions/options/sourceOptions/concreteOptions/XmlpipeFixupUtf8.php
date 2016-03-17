<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class XmlpipeFixupUtf8
 *
 * perform UTF-8 validation, and filter out incorrect codes
 * avoids XML parser choking on non-UTF-8 documents
 * optional, default is 0
 *
 * xmlpipe_fixup_utf8    = 1
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class XmlpipeFixupUtf8 extends SourceOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}