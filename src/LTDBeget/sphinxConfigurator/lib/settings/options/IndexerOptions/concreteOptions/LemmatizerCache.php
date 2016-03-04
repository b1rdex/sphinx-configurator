<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 8:27 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions\IndexerOption;

/**
 * Class LemmatizerCache
 *
 * lemmatizer cache size
 * improves the indexing time when the lemmatization is enabled
 * optional, default is 256K
 *
 * lemmatizer_cache = 512M
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\IndexerOptions\concreteOptions
 */
class LemmatizerCache extends IndexerOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}