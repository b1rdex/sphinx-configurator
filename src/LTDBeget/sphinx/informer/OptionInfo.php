<?php
/**
 * @author: Viskov Sergey
 * @date: 3/17/16
 * @time: 2:32 PM
 */

namespace LTDBeget\sphinx\informer;


use LTDBeget\sphinx\informer\enums\blocks\eOptionsBlock;
use LTDBeget\sphinx\informer\enums\eSphinxVersion;
use LTDBeget\sphinx\informer\enums\options\eOption;

/**
 * Class OptionInfo
 * structure class for storing option info
 * @package LTDBeget\sphinx\informer
 */
final class OptionInfo
{
    /**
     * OptionInfo constructor.
     * @param eOption $name
     * @param eOptionsBlock $block
     * @param eSphinxVersion $version
     * @param string $description
     * @param bool $isMultiValue
     * @param string $docLink
     */
    public function __construct(
        eOption $name,
        eOptionsBlock $block,
        eSphinxVersion $version,
        string $description,
        bool $isMultiValue,
        string $docLink
    )
    {
        $this->name = $name;
        $this->block = $block;
        $this->version = $version;
        $this->description = $description;
        $this->isMultiValue = $isMultiValue;
        $this->docLink = $docLink;

    }

    /**
     * @return eOption
     */
    public function getName() : eOption
    {
        return $this->name;
    }

    /**
     * @return eOptionsBlock
     */
    public function getBlock() : eOptionsBlock
    {
        return $this->block;
    }

    /**
     * Version of documentation info
     * @return eSphinxVersion
     */
    public function getVersion() : eSphinxVersion
    {
        return $this->version;
    }

    /**
     * @return boolean
     */
    public function isIsMultiValue() : bool
    {
        return $this->isMultiValue;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getDocLink() : string
    {
        return $this->docLink;
    }

    /**
     * @var eOption
     */
    private $name;

    /**
     * @var eOptionsBlock
     */
    private $block;

    /**
     * @var eSphinxVersion
     */
    private $version;

    /**
     * @var bool
     */
    private $isMultiValue;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $docLink;
}