<?php
/**
 * @author: Viskov Sergey
 * @date: 3/17/16
 * @time: 2:49 PM
 */

namespace LTDBeget\sphinx\informer\enums\blocks;


/**
 * Class eSettings
 * @package LTDBeget\sphinx\informer\enums\blocks
 *
 * @method static eSettings INDEXER()
 * @method static eSettings SEARCHD()
 * @method static eSettings COMMON()
 *
 */
class eSettings extends eOptionsBlock
{
    const INDEXER = "indexer";
    const SEARCHD = "searchd";
    const COMMON = "common";
}