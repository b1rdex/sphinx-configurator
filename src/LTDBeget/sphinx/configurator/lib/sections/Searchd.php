<?php
/**
 * @author: Viskov Sergey
 * @date: 3/18/16
 * @time: 5:43 PM
 */

namespace LTDBeget\sphinx\configurator\lib\sections;


use LTDBeget\sphinx\configurator\lib\Section;

class Searchd extends Section
{
    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getName();
    }
}