<?php
/**
 * @author: Viskov Sergey
 * @date: 3/17/16
 * @time: 2:46 PM
 */

namespace LTDBeget\sphinx\informer\enums\options;


use MabeEnum\Enum;

/**
 * Class eOption
 * @package LTDBeget\sphinx\informer\enums\options
 */
abstract class eOption extends Enum
{
    public function __toString() : string
    {
        return $this->getValue();
    }
}