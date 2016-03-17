<?php
/**
 * @author: Viskov Sergey
 * @date: 3/17/16
 * @time: 1:14 PM
 */

namespace LTDBeget\sphinx\informer\enums;


use MabeEnum\Enum;


/**
 * Class eSphinxVersion
 * list of available sphinx version for library
 *
 * @package LTDBeget\sphinx\informer\enums
 *
 * @method static eSphinxVersion V_2_1_1()
 * @method static eSphinxVersion V_2_1_2()
 * @method static eSphinxVersion V_2_1_3()
 * @method static eSphinxVersion V_2_1_4()
 * @method static eSphinxVersion V_2_1_5()
 * @method static eSphinxVersion V_2_1_6()
 * @method static eSphinxVersion V_2_1_7()
 * @method static eSphinxVersion V_2_1_8()
 * @method static eSphinxVersion V_2_1_9()
 * @method static eSphinxVersion V_2_2_1()
 * @method static eSphinxVersion V_2_2_2()
 * @method static eSphinxVersion V_2_2_3()
 * @method static eSphinxVersion V_2_2_4()
 * @method static eSphinxVersion V_2_2_5()
 * @method static eSphinxVersion V_2_2_6()
 * @method static eSphinxVersion V_2_2_8()
 * @method static eSphinxVersion V_2_2_10()
 *
 */
final class eSphinxVersion extends Enum
{
    const V_2_1_1  = "2.1.1";
    const V_2_1_2  = "2.1.2";
    const V_2_1_3  = "2.1.3";
    const V_2_1_4  = "2.1.4";
    const V_2_1_5  = "2.1.5";
    const V_2_1_6  = "2.1.6";
    const V_2_1_7  = "2.1.7";
    const V_2_1_8  = "2.1.8";
    const V_2_1_9  = "2.1.9";
    const V_2_2_1  = "2.2.1";
    const V_2_2_2  = "2.2.2";
    const V_2_2_3  = "2.2.3";
    const V_2_2_4  = "2.2.4";
    const V_2_2_5  = "2.2.5";
    const V_2_2_6  = "2.2.6";
    const V_2_2_8  = "2.2.8";
    const V_2_2_10 = "2.2.10";

    public function __toString() : string
    {
        return $this->getValue();
    }
}