<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 7:16 PM
 */

namespace LTDBeget\sphinx\configurator\lib;


use LTDBeget\sphinx\configurator\exceptions\NotFoundException;
use LTDBeget\sphinx\configurator\Configuration;

abstract class Definition
{
    /**
     * Name of source
     * @var string
     */
    private $name;

    /**
     * Name of inheritance index
     * @var string
     */
    private $inheritanceName = null;

    /**
     * @var Configuration
     */
    private $sphinxConfiguration;

    /**
     * @param Configuration $sphinxConfiguration
     * @param string $name
     * @param string $inheritanceName
     */
    public function __construct(Configuration $sphinxConfiguration, string $name, string $inheritanceName = null)
    {
        $this->name = $name;
        $this->inheritanceName = $inheritanceName;
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
     * Name of source
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return string
     * @throws NotFoundException
     */
    public function getInheritanceName() : string
    {
        if(! $this->isHasInheritance()) {
            throw new NotFoundException("There are no inheritance definition");
        }

        return $this->inheritanceName;
    }

    /**
     * @return bool
     */
    public function isHasInheritance() : bool
    {
        return !is_null($this->inheritanceName);
    }

    /**
     * @return string
     * @throws NotFoundException
     */
    public function __toString() : string
    {
        $string = "{$this->getType()} {$this->getName()}";

        if($this->isHasInheritance()) {
            $string .= " : ".$this->getInheritanceName();
        }
        return $string;
    }

    /**
     * @return string
     */
    protected function getType() : string
    {
        return strtolower(str_replace("Definition", "", (new \ReflectionClass($this))->getShortName()));
    }

    /**
     * @return bool
     */
    abstract public function validate() : bool;
}