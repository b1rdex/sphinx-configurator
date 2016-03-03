<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 8:19 PM
 */

namespace LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions;


use LTDBeget\sphinxConfigurator\exceptions\WrongContextException;
use LTDBeget\sphinxConfigurator\lib\settings\SearchdSettings;
use LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions\concreteOptions\Listen;

/**
 * Class SearchdOptionAppender
 * @package LTDBeget\sphinxConfigurator\lib\settings\options\SearchdOptions
 */
class SearchdOptionAppender
{
    /**
     * SearchdOptionAppender constructor.
     * @param SearchdSettings $searchdSettings
     */
    public function __construct(SearchdSettings $searchdSettings)
    {
        $this->searchdSettings = $searchdSettings;
    }

    /**
     * @param $value
     * @return Listen
     * @throws WrongContextException
     */
    public function addListen($value)
    {
        $option = new Listen($this->getSearchd(), $value);
        $this->getSearchd()->addOption($option);

        return $option;
    }

    /**
     * @var SearchdSettings
     */
    private $searchdSettings;

    /**
     * @return SearchdSettings
     */
    private function getSearchd() : SearchdSettings
    {
        return $this->searchdSettings;
    }
}