<?php
/**
 * @author: Viskov Sergey
 * @date: 3/17/16
 * @time: 2:41 PM
 */

namespace LTDBeget\sphinx\informer\enums\blocks;


use MabeEnum\Enum;

/**
 * Class eOptionsBlock
 * @package LTDBeget\sphinx\informer\enums\blocks
 */
abstract class eOptionsBlock extends Enum
{
    public function __toString() : string
    {
        return $this->getValue();
    }
}