<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\IndexOption;

/**
 * Class BlendMode
 *
 * blended token indexing mode
 * a comma separated list of blended token indexing variants
 * known variants are trim_none, trim_head, trim_tail, trim_both, skip_pure
 * optional, default is trim_none
 *
 * blend_mode        = trim_tail, skip_pure
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions\concreteOptions
 */
class BlendMode extends IndexOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}