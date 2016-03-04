<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:08 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class CollationLibcLocale
 *
 * server-wide locale for libc based collations
 * optional, default is C
 *
 * collation_libc_locale	= ru_RU.UTF-8
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class CollationLibcLocale extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}