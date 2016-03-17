<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:22 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class SnippetsFilePrefix
 *
 * a prefix to prepend to the local file names when creating snippets
 * with load_files and/or load_files_scatter options
 * optional, default is empty
 *
 * snippets_file_prefix        = /mnt/common/server1/
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class SnippetsFilePrefix extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}