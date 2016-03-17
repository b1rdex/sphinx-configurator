<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class SqlAttrMulti
 *
 * multi-valued attribute (MVA) attribute declaration
 * multi-value (an arbitrary number of attributes is allowed), optional
 * MVA values are variable length lists of unsigned 32-bit integers
 * 
 * syntax is ATTR-TYPE ATTR-NAME 'from' SOURCE-TYPE [;QUERY] [;RANGE-QUERY]
 * ATTR-TYPE is 'uint' or 'timestamp'
 * SOURCE-TYPE is 'field', 'query', or 'ranged-query'
 * QUERY is SQL query used to fetch all ( docid, attrvalue ) pairs
 * RANGE-QUERY is SQL query used to fetch min and max ID values, similar to 'sql_query_range'
 * 
 * sql_attr_multi		= uint tag from query; SELECT docid, tagid FROM tags
 * sql_attr_multi		= uint tag from ranged-query; \
 * SELECT docid, tagid FROM tags WHERE id>=start AND id<=end; \
 * SELECT MIN(docid), MAX(docid) FROM tags
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class SqlAttrMulti extends SourceOption
{
    /**
     * @return bool
     */
    public function isMultiValue() : bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}