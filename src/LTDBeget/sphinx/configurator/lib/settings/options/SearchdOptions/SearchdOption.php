<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:19 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions;


use LTDBeget\sphinx\configurator\lib\Option;
use LTDBeget\sphinx\configurator\lib\settings\SearchdSettings;

/**
 * Class SearchdOption
 * @package LTDBeget\sphinx\configurator\lib\settings\options\SearchdOptions
 */
abstract class SearchdOption extends Option
{
    /**
     * @var SearchdSettings
     */
    private $searchdSettings;

    /**
     * SearchdOption constructor.
     * @param SearchdSettings $searchdSettings
     * @param string $value
     */
    public function __construct(SearchdSettings $searchdSettings, string $value)
    {
        $this->value = $value;
        $this->searchdSettings = $searchdSettings;
    }

    /**
     * @return SearchdSettings
     */
    public function getSearchd() : SearchdSettings
    {
        return $this->searchdSettings;
    }
}