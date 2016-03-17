<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class SnippetsFilePrefix
 *
 * snippet document file name prefix
 * preprended to file names when generating snippets using load_files option
 * WARNING, this is a prefix (not a path), trailing slash matters!
 * optional, default is empty
 * 
 * snippets_file_prefix	= /mnt/mydocs/server1
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class SnippetsFilePrefix extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}