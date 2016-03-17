<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class RtAttrBigint
 *
 * RT indexes currently support the following attribute types:
 * uint, bigint, float, timestamp, string, mva, mva64, json
 * 
 * rt_attr_bigint		= guid
 * rt_attr_float		= gpa
 * rt_attr_timestamp	= ts_added
 * rt_attr_string		= author
 * rt_attr_multi		= tags
 * rt_attr_multi_64	= tags64
 * rt_attr_json		= extra_data
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class RtAttrBigint extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}