<?php
/**
 * @author: Viskov Sergey
 * @date: 3/18/16
 * @time: 5:11 PM
 */

namespace LTDBeget\sphinx\configurator\configurationEntities\base;


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\configurator\configurationEntities\Option;
use LTDBeget\sphinx\configurator\exceptions\LogicException;
use LTDBeget\sphinx\configurator\exceptions\WrongContextException;
use LTDBeget\sphinx\enums\base\eOption;
use LTDBeget\sphinx\enums\eSection;
use LTDBeget\sphinx\informer\Informer;
use ReflectionClass;

/**
 * Class Section
 * @package LTDBeget\sphinx\configurator\configurationEntities\base
 * @method Option addOption(eOption $name, string $value)
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
    private $type = null;

    /**
     * @var Option[]
     */
    private $options = [];

    /**
     * Section constructor.
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function className() : string
    {
        return get_called_class();
    }

    /**
     * @return eSection
     */
    final public function getType() : eSection
    {
        if (is_null($this->type)) {
            $this->initType();
        }

        return $this->type;
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
    public function __toString() : string
    {
        return $this->getType();
    }

    /**
     * @return Option[]
     */
    final public function iterateOptions()
    {
        foreach ($this->options as $option) {
            if (is_array($option)) {
                foreach ($option as $multiOption) {
                    yield $multiOption;
                }
            } else {
                yield $option;
            }

        }
    }

    /**
     * @param eOption $name
     * @param string $value
     * @return Option
     * @throws WrongContextException
     */
    final protected function addOptionInternal(eOption $name, string $value) : Option
    {
        $informer = $this->getInformer();
        if (!$informer->isKnownOption($this->getType(), $name)) {
            $version = $this->getConfiguration()->getVersion();
            throw new WrongContextException(
                "For sphinx v. {$version} option {$name}  in {$this->getType()} isn't available"
            );
        }
        $isMultiValue = $informer->getOptionInfo($this->getType(), $name)->isIsMultiValue();

        $option = new Option($this, $name, $value, $isMultiValue);

        if ($option->isMultiValue()) {
            if (!array_key_exists((string) $option->getName(), $this->options)) {
                $this->options[(string) $option->getName()] = [];
            }
            $this->options[(string) $option->getName()][] = $option;

        } else {
            $this->options[(string) $option->getName()] = $option;
        }

        return $option;
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

    protected function shortClassName() : string
    {
        return (new ReflectionClass($this->className()))->getShortName();
    }

    /**
     * @throws LogicException
     */
    private function initType()
    {
        $this->type = eSection::get(strtolower($this->shortClassName()));
    }
}