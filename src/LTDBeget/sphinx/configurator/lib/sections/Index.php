<?php
/**
 * @author: Viskov Sergey
 * @date: 3/18/16
 * @time: 5:32 PM
 */

namespace LTDBeget\sphinx\configurator\lib\sections;


use LTDBeget\sphinx\configurator\lib\Section;


class Index extends Section
{
    // TODO constructor

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getName();
    }
}