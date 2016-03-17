<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 8:26 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\IndexerOption;

/**
 * Class OnFileFieldError
 *
 * how to handle IO errors in file fields
 * known values are 'ignore_field', 'skip_document', and 'fail_index'
 * optional, default is 'ignore_field'
 *
 * on_file_field_error = skip_document
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\IndexerOptions\concreteOptions
 */
class OnFileFieldError extends IndexerOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}