<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 1:10 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions;


use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\SearchdOption;

/**
 * Class PredictedTimeCosts
 *
 * costs for max_predicted_time model, in (imaginary) nanoseconds
 * optional, default is "doc=64, hit=48, skip=2048, match=64"
 *
 * predicted_time_costs	= doc=64, hit=48, skip=2048, match=64
 *
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions
 */
class PredictedTimeCosts extends SearchdOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}