<?php
/**
 * @author: Viskov Sergey
 * @date: 3/3/16
 * @time: 6:57 PM
 */

namespace LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\CommonOption;

/**
 * Class RlpEnvironment
 *
 * path to RLP environment file
 * optional, default is /usr/local/share/rlp-environment.xml (see ./configure --datadir)
 *
 * rlp_environment = /usr/local/share/sphinx/rlp/rlp/etc/rlp-environment.xml
 *
 * @package LTDBeget\sphinx\configurator\lib\settings\options\commonOptions\concreteOptions
 */
class RlpEnvironment extends CommonOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}