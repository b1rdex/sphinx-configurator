<?php
/**
 * TODO оберунть в PhpUnit
 * @author: Viskov Sergey
 * @date: 3/16/16
 * @time: 2:04 PM
 */


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\enums\eVersion;

require(__DIR__ . '/../vendor/autoload.php');

$config_path = realpath(__DIR__."/../sphinx/conf/valid.example.conf");
$plain_config = file_get_contents($config_path);

$times = [];

$n = 10;
for($i = 1; $i <= $n; $i++) {
    $start = microtime(true); //начало измерения

    $config = Configuration::fromString($plain_config, eVersion::V_2_2_10());

    $end = microtime(true); //конец измерения

    $times[] = $end - $start;
}


$average = array_sum($times)/count($times);
$max = max($times);
$min = min($times);
echo "Среднее время выполнения ".$average.PHP_EOL;
echo "Минимальное время выполнения ".$min.PHP_EOL;
echo "Максимальное время выполнения ".$max.PHP_EOL;
echo "Количество запусков ".$n.PHP_EOL;