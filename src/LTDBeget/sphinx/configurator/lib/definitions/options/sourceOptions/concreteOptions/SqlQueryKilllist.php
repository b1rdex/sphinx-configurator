<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class SqlQueryKilllist
 *
 * kill-list query, fetches the document IDs for kill-list
 * k-list will suppress matches from preceding indexes in the same query
 * optional, default is empty
 *
 * sql_query_killlist    = SELECT id FROM documents WHERE edited>=@last_reindex
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class SqlQueryKilllist extends SourceOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}