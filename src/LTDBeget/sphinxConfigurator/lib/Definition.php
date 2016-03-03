<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 7:16 PM
 */

namespace LTDBeget\sphinxConfigurator\lib;


use LTDBeget\sphinxConfigurator\exceptions\NotFoundException;
use LTDBeget\sphinxConfigurator\SphinxConfiguration;

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
     * @var SphinxConfiguration
     */
    private $sphinxConfiguration;

    /**
     * @param SphinxConfiguration $sphinxConfiguration
     * @param string $name
     * @param string $inheritanceName
     */
    public function __construct(SphinxConfiguration $sphinxConfiguration, string $name, string $inheritanceName = null)
    {
        $this->name = $name;
        $this->inheritanceName = $inheritanceName;
        $this->sphinxConfiguration = $sphinxConfiguration;
    }

    /**
     * @return SphinxConfiguration
     */
    public function getConfiguration() : SphinxConfiguration
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