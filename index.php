<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 4:34 PM
 */

use LTDBeget\sphinxConfigurator\serializers\PlainSerializer;

require 'vendor/autoload.php';

$config_path = __DIR__.DIRECTORY_SEPARATOR."stubs".DIRECTORY_SEPARATOR."valid.example.conf";
$config_path = __DIR__.DIRECTORY_SEPARATOR."stubs".DIRECTORY_SEPARATOR."sphinx.conf";
$plain_config = file_get_contents($config_path);


$config = PlainSerializer::deserialize($plain_config);
echo PlainSerializer::serialize($config);