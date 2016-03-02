<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:19 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions;


use LTDBeget\sphinxConfigurator\lib\SearchdSettings;

/**
 * Class SearchdOptionAppender
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions
 */
class SearchdOptionAppender
{
    /**
     * @var SearchdSettings
     */
    private $searchdSettings;

    /**
     * SearchdOptionAppender constructor.
     * @param SearchdSettings $searchdSettings
     */
    public function __construct(SearchdSettings $searchdSettings)
    {
        $this->searchdSettings = $searchdSettings;
    }

    /**
     * @return SearchdSettings
     */
    public function getIndexer() : SearchdSettings
    {
        return $this->searchdSettings;
    }
}