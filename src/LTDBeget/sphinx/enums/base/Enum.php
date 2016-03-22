<?php
/**
 * @author: Viskov Sergey
 * @date  : 17/03/16
 * @time  : 22:40
 */

namespace LTDBeget\sphinx\enums\base;

/**
 * Class Enum
 *
 * @package LTDBeget\sphinx\enums\base
 */
abstract class Enum extends \MabeEnum\Enum
{
    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string)$this->getValue();
    }
}