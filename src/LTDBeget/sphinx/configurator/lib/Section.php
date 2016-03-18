<?php
/**
 * @author: Viskov Sergey
 * @date: 3/18/16
 * @time: 5:11 PM
 */

namespace LTDBeget\sphinx\configurator\lib;


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\configurator\exceptions\WrongContextException;
use LTDBeget\sphinx\enums\base\eOption;
use LTDBeget\sphinx\enums\base\eSection;
use LTDBeget\sphinx\informer\Informer;

/**
 * Class Section
 * @package LTDBeget\sphinx\configurator\lib
 */
abstract class Section
{
    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * @var eSection
     */
    private $sectionName;

    /**
     * @var Option[]
     */
    private $options;

    public function __construct(Configuration $configuration, eSection $sectionName)
    {
        $this->configuration;
        $this->sectionName = $sectionName;
    }

    /**
     * @return eSection
     */
    final public function getName() : eSection
    {
        return $this->sectionName;
    }

    /**
     * @return Configuration
     */
    final public function getConfiguration() : Configuration
    {
        return $this->configuration;
    }

    /**
     * @return string
     */
    abstract public function __toString() : string;

    /**
     * @param eOption $name
     * @param string $value
     * @return Option
     * @throws WrongContextException
     */
    final public function addOption(eOption $name, string $value) : Option
    {
        $informer = $this->getInformer();
        if(! $informer->isKnownOption($this->getName(), $name)) {
            // TODO нормальное сообщение
            throw new WrongContextException;
        }
        $isMultiValue = $informer->getOptionInfo($this->getName(), $name)->isIsMultiValue();

        $option = new Option($this, $name, $value, $isMultiValue);

        $this->addOptionInternal($option);

        return $option;
    }

    /**
     * @param Option $option
     * @return mixed
     */
    protected function addOptionInternal(Option $option)
    {
        if($option->isMultiValue()) {
            if(!array_key_exists($option, $this->options)) {
                $this->options[(string) $option->getName()] = [];
            }
            $this->options[(string) $option->getName()][] = $option;

        } else {
            $this->options[(string) $option->getName()] = $option;
        }
    }

    /**
     * @return Informer
     */
    protected function getInformer() : Informer
    {
        return $this
            ->getConfiguration()
            ->getInformer();
    }
}