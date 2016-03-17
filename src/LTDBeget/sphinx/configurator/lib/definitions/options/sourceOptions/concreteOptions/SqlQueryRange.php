<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class SqlQueryRange
 *
 * range query setup, query that must return min and max ID values
 * optional, default is empty
 *
 * sql_query will need to reference start and end boundaries
 * if using ranged query:
 *
 * sql_query        = \
 * SELECT doc.id, doc.id AS group, doc.title, doc.data \
 * FROM documents doc \
 * WHERE id>=start AND id<=end
 *
 * sql_query_range        = SELECT MIN(id),MAX(id) FROM documents
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class SqlQueryRange extends SourceOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}