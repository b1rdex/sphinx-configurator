<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class SqlJoinedField
 *
 * joined/payload field fetch query
 * joined fields let you avoid (slow) JOIN and GROUP_CONCAT
 * payload fields let you attach custom per-keyword values (eg. for ranking)
 * 
 * syntax is FIELD-NAME 'from'  ( 'query' | 'payload-query' ); QUERY
 * joined field QUERY should return 2 columns (docid, text)
 * payload field QUERY should return 3 columns (docid, keyword, weight)
 * 
 * REQUIRES that query results are in ascending document ID order!
 * multi-value, optional, default is empty list of queries
 * 
 * sql_joined_field	= tags from query; SELECT docid, CONCAT('tag',tagid) FROM tags ORDER BY docid ASC
 * sql_joined_field	= wtags from payload-query; SELECT docid, tag, tagweight FROM tags ORDER BY docid ASC
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class SqlJoinedField extends SourceOption
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