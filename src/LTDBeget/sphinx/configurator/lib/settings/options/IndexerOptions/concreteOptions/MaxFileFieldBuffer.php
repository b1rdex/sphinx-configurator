<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 8:13 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\IndexerOption;

/**
 * Class MaxFileFieldBuffer
 *
 * maximum file field adaptive buffer size
 * optional, default is 8M, minimum is 1M
 *
 * max_file_field_buffer	= 32M
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\concreteOptions
 */
class MaxFileFieldBuffer extends IndexerOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}