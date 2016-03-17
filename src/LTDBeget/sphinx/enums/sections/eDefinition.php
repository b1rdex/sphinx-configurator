<?php
/**
 * @author: Viskov Sergey
 * @date: 3/17/16
 * @time: 2:48 PM
 */

namespace LTDBeget\sphinx\enums\sections;


use LTDBeget\sphinx\enums\base\eSection;

/**
 * Class eDefinition
 * @package LTDBeget\sphinx\informer\enums\blocks
 *
 * @method static eDefinition SOURCE()
 * @method static eDefinition INDEX()
 *
 */
final class eDefinition extends eSection
{
    const SOURCE = "source";
    const INDEX  = "index";
}