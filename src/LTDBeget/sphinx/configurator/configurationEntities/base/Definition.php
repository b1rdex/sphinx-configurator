<?php
/**
 * @author: Viskov Sergey
 * @date: 19.03.16
 * @time: 0:04
 */

namespace LTDBeget\sphinx\configurator\configurationEntities\base;


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\configurator\exceptions\LogicException;

abstract class Definition extends Section
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $inheritance;

    /**
     * Source constructor.
     * @param Configuration $configuration
     * @param string $name
     * @param string|null $inheritance
     * @throws LogicException
     */
    public function __construct(
        Configuration $configuration,
        string $name,
        string $inheritance = null
    )
    {
        if(empty($name)) {
            throw new LogicException("Name of section {$this->getType()} can't be empty.");
        }

        if(! is_null($inheritance) && empty($name)) {
            throw new LogicException("Inheritance of section {$this->getType()} can't be empty.");
        }

        // TODO CHECK NAME DUPLICATE
        // TODO CHECK INHERITANCE PARENT EXISTS

        parent::__construct($configuration);
        $this->name = $name;
        $this->inheritance = $inheritance;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        $string = "{$this->getType()} {$this->getName()}";
        if($this->isHasInheritance()) {
            // TODO if object parent get name
            $string .= " : {$this->getInheritance()}";
        }
        return $string;
    }

    /**
     * @return bool
     */
    public function isHasInheritance() : bool
    {
        return ! is_null($this->inheritance);
    }

    /**
     * TODO RETURN Object Parent not it name
     * @return string
     * @throws LogicException
     */
    public function getInheritance() : string
    {
        if(! $this->isHasInheritance()) {
            throw new LogicException("Trying to get inheritance for {$this->getType()} which doesn't' have it.");
        }

        return $this->inheritance;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
}