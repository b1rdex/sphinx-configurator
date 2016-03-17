<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class SqlQueryPostIndex
 *
 * post-index-query, executed on successful indexing completion
 * optional, default is empty
 * $maxid expands to max document ID actually fetched from DB
 *
 * sql_query_post_index    = REPLACE INTO counters ( id, val ) \
 * VALUES ( max_indexed_id, $maxid )
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class SqlQueryPostIndex extends SourceOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}