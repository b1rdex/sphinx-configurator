<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class SqlFileField
 *
 * file based field declaration
 *
 * content of this field is treated as a file name
 * and the file gets loaded and indexed in place of a field
 *
 * max file size is limited by max_file_field_buffer indexer setting
 * file IO errors are non-fatal and get reported as warnings
 *
 * sql_file_field        = content_file_path
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class SqlFileField extends SourceOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}