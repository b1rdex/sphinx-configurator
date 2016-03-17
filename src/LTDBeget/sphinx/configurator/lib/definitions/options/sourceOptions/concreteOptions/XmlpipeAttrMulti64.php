<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class XmlpipeAttrMulti64
 *
 * xmlpipe2 attribute declaration
 * multi-value, optional, default is empty
 * all xmlpipe_attr_XXX options are fully similar to sql_attr_XXX
 * examples:
 *
 * xmlpipe_attr_timestamp    = published
 * xmlpipe_attr_uint    = author_id
 * xmlpipe_attr_bool    = is_enabled
 * xmlpipe_attr_float    = latitude
 * xmlpipe_attr_bigint    = guid
 * xmlpipe_attr_multi    = tags
 * xmlpipe_attr_multi_64    = tags64
 * xmlpipe_attr_string    = title
 * xmlpipe_attr_json    = extra_data
 * xmlpipe_field_string    = content
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class XmlpipeAttrMulti64 extends SourceOption
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