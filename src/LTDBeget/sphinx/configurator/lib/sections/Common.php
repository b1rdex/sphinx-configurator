<?php
/**
 * @author: Viskov Sergey
 * @date: 3/18/16
 * @time: 5:33 PM
 */

namespace LTDBeget\sphinx\configurator\lib\sections;


use LTDBeget\sphinx\configurator\lib\Section;

class Common extends Section
{
    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getName();
    }
}