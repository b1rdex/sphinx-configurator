<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:19 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions;


use LTDBeget\sphinxConfigurator\lib\Option;
use LTDBeget\sphinxConfigurator\lib\SearchdSettings;

/**
 * Class SearchdOption
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions
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
    public function getSearchdSettings() : SearchdSettings
    {
        return $this->searchdSettings;
    }
}