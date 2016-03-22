<?php
/**
 * @author: Viskov Sergey
 * @date  : 3/2/16
 * @time  : 8:04 PM
 */

namespace LTDBeget\sphinx\configurator\configurationEntities;

use LTDBeget\sphinx\configurator\configurationEntities\base\Section;
use LTDBeget\sphinx\enums\base\eOption;
use LTDBeget\sphinx\informer\OptionInfo;

/**
 * Class Option
 *
 * @package LTDBeget\sphinx\configurator\configurationEntities\base
 */
class Option
{
    /**
     * Option constructor.
     *
     * @param Section $section
     * @param eOption $optionName
     * @param string  $value
     * @param bool    $multiValue
     */
    public function __construct(Section $section, eOption $optionName, string $value, bool $multiValue)
    {
        $this->section      = $section;
        $this->optionName   = $optionName;
        $this->value        = trim($value);
        $this->isMultiValue = $multiValue;
    }

    /**
     * @return Section
     */
    public function getSection() : Section
    {
        return $this->section;
    }

    /**
     * @return eOption
     */
    public function getName() : eOption
    {
        return $this->optionName;
    }

    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return Option
     */
    public function setValue(string $value) : Option
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return OptionInfo
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \LTDBeget\sphinx\informer\exceptions\InformerRuntimeException
     */
    public function getInfo() : OptionInfo
    {
        return $this
            ->getSection()
            ->getConfiguration()
            ->getInformer()
            ->getOptionInfo(
                $this->getSection()->getType(),
                $this->getName());
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return "{$this->getName()} = {$this->getValue()}";
    }

    /**
     * @return bool
     */
    public function isMultiValue() : bool
    {
        return $this->isMultiValue;
    }

    /**
     * mark option as deleted
     */
    public function delete()
    {
        $this->isDeleted = true;
    }

    /**
     * is option marked as deleted
     *
     * @return bool
     */
    public function isDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * @var string
     */
    protected $value;

    /**
     * @var bool
     */
    private $isMultiValue;

    /**
     * @var boolean
     */
    private $isDeleted = false;

    /**
     * @var Section
     */
    private $section;
    /**
     * @var eOption
     */
    private $optionName;
}