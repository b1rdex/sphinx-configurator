<?php
/**
 * @author: Viskov Sergey
 * @date: 19.03.16
 * @time: 0:04
 */

namespace LTDBeget\sphinx\configurator\configurationEntities\base;


use BadMethodCallException;
use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\configurator\exceptions\SectionException;

/**
 * Class Definition
 * @package LTDBeget\sphinx\configurator\configurationEntities\base
 */
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
     * @throws \BadMethodCallException
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function __construct(
        Configuration $configuration,
        string $name,
        string $inheritance = null
    )
    {
        if ('' === $name) {
            throw new BadMethodCallException("Name of section {$this->getType()} can't be empty.");
        }

        if (null !== $inheritance && '' === $inheritance) {
            throw new BadMethodCallException("Inheritance of section {$this->getType()} can't be empty.");
        }

        // TODO CHECK NAME DUPLICATE
        // TODO CHECK INHERITANCE PARENT EXISTS

        parent::__construct($configuration);
        $this->name        = $name;
        $this->inheritance = $inheritance;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        try {
            $string = "{$this->getType()} {$this->getName()}";
            if ($this->isHasInheritance()) {
                // TODO if object parent get name
                $string .= " : {$this->getInheritance()}";
            }
        } catch (\Exception $e) {
            $string = '';
        }
        
        return $string;
    }

    /**
     * @return bool
     */
    public function isHasInheritance() : bool
    {
        return null !== $this->inheritance;
    }

    /**
     * TODO если удален родитель удалить наследника
     * TODO RETURN Object Parent not it name
     * @return string
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \LTDBeget\sphinx\configurator\exceptions\SectionException
     */
    public function getInheritance() : string
    {
        if (!$this->isHasInheritance()) {
            throw new SectionException("Trying to get inheritance for {$this->getType()} which doesn't' have it.");
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