<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 7:44 PM
 */

namespace LTDBeget\sphinx\configurator\lib;


use LTDBeget\sphinx\configurator\Configuration;

abstract class Settings
{
    /**
     * @var Configuration
     */
    private $sphinxConfiguration;

    /**
     * @param Configuration $sphinxConfiguration
     */
    public function __construct(Configuration $sphinxConfiguration)
    {
        $this->sphinxConfiguration = $sphinxConfiguration;
    }

    /**
     * @return Configuration
     */
    public function getConfiguration() : Configuration
    {
        return $this->sphinxConfiguration;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return "{$this->getType()}";
    }

    /**
     * @return string
     */
    protected function getType() : string
    {
        return strtolower(str_replace("Settings", "", (new \ReflectionClass($this))->getShortName()));
    }

    /**
     * @return bool
     */
    abstract public function validate() : bool;
}