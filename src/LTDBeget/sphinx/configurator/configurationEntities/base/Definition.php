<?php
/**
 * @author: Viskov Sergey
 * @date  : 19.03.16
 * @time  : 0:04
 */

namespace LTDBeget\sphinx\configurator\configurationEntities\base;

use InvalidArgumentException;
use LogicException;
use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\configurator\exceptions\SectionException;
use LTDBeget\sphinx\enums\eSection;

/**
 * Class Definition
 *
 * @package LTDBeget\sphinx\configurator\configurationEntities\base
 */
abstract class Definition extends Section
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Definition
     */
    private $inheritance;

    /**
     * Source constructor.
     *
     * @param Configuration $configuration
     * @param string        $name
     * @param string|null   $inheritance
     *
     * @throws InvalidArgumentException
     * @throws LogicException
     * @throws SectionException
     */
    public function __construct(
        Configuration $configuration,
        string $name,
        string $inheritance = NULL
    )
    {
        parent::__construct($configuration);

        $this->defineName($this->sanitizeName($name));

        if (!empty($inheritance)) {
            $this->setParent($this->sanitizeName($inheritance));
        }
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        try {
            $string = "{$this->getType()} {$this->getName()}";
            if ($this->isHasInheritance()) {
                $string .= " : {$this->getInheritance()->getName()}";
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
        return NULL !== $this->inheritance;
    }

    /**
     * @return Definition
     * @throws LogicException
     * @throws InvalidArgumentException
     * @throws SectionException
     */
    public function getInheritance() : Definition
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

    /**
     * @throws LogicException
     * @throws SectionException
     * @throws InvalidArgumentException
     */
    public function delete()
    {
        foreach ($this->getSelfTypeIterator() as $definition) {
            if ($definition->isHasInheritance() && $definition->getInheritance() === $this) {
                $definition->delete();
            }
        }

        parent::delete();
    }

    /**
     * @param string $name
     *
     * @throws LogicException
     * @throws SectionException
     */
    private function defineName(string $name)
    {
        foreach ($this->getSelfTypeIterator() as $definition) {
            if ($definition->getName() === $name) {
                throw new SectionException("Duplicate name {$name} found in {$this->getType()} section");
            }
        }

        $this->name = $name;
    }

    /**
     * @param string $inheritance
     *
     * @throws SectionException
     * @throws LogicException
     */
    private function setParent(string $inheritance)
    {
        foreach ($this->getSelfTypeIterator() as $definition) {
            if ($definition->getName() === $inheritance) {
                $this->inheritance = $definition;
            }
        }

        if (!$this->isHasInheritance()) {
            throw new SectionException("Inheritance with name {$inheritance} of section {$this->getType()} doesn't exists in configuration");
        }
    }

    /**
     * @param string $name
     *
     * @return string
     * @throws \InvalidArgumentException
     * @throws SectionException
     */
    private function sanitizeName(string $name) : string
    {
        $name = trim($name);

        if (empty($name)) {
            throw new SectionException("Name or inheritance of section {$this->getType()} can't be empty.");
        }

        if (!$this->isValidName($name)) {
            throw new SectionException("Name or inheritance of section {$this->getType()} must contains only A-Za-z and _ symbols");
        }

        return $name;
    }

    /**
     * @param $name
     *
     * @return bool
     */
    private function isValidName($name) : bool
    {
        return (bool)preg_match("/^[A-Za-z_\d]*$/", $name);
    }

    /**
     * @return Definition[]
     * @throws LogicException
     */
    private function getSelfTypeIterator()
    {
        switch ($this->getType()) {
            case eSection::INDEX:
                $iterator = $this->getConfiguration()->iterateIndex();
                break;
            case eSection::SOURCE:
                $iterator = $this->getConfiguration()->iterateSource();
                break;
            default:
                throw new LogicException("Unknown type {$this->getType()}");
        }

        return $iterator;
    }
}