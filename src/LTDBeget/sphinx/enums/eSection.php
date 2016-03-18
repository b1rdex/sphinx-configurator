<?php
/**
 * @author: Viskov Sergey
 * @date: 3/17/16
 * @time: 2:41 PM
 */

namespace LTDBeget\sphinx\enums;


use LTDBeget\sphinx\enums\base\Enum;

/**
 * Class eOptionsBlock
 * @package LTDBeget\sphinx\informer\enums\blocks
 *
 * @method static eSection SOURCE()
 * @method static eSection INDEX()
 * @method static eSection INDEXER()
 * @method static eSection SEARCHD()
 * @method static eSection COMMON()
 */
final class eSection extends Enum
{
    const SOURCE  = "source";
    const INDEX   = "index";
    const INDEXER = "indexer";
    const SEARCHD = "searchd";
    const COMMON  = "common";
}