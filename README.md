# sphinx-configurator

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/voksiv/sphinx-configurator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/voksiv/sphinx-configurator/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/voksiv/sphinx-configurator/badges/build.png?b=master)](https://scrutinizer-ci.com/g/voksiv/sphinx-configurator/build-status/master)
[![License MIT](http://img.shields.io/badge/license-MIT-blue.svg?style=flat)](https://github.com/voksiv/sphinx-configurator/blob/master/LICENSE)
[![Documentation](https://img.shields.io/badge/code-documented-brightgreen.svg)](http://voksiv.github.io/sphinx-configurator/documentation/html/index.html)

Php library for parsing and editing sphinx.conf files. pragmatically with high level abstraction

## Installation

```shell
composer require voksiv/sphinx-configurator
```

## Usage
```php
<?php

require 'vendor/autoload.php';

use LTDBeget\sphinxConfigurator\serializers\ArraySerializer;
use LTDBeget\sphinxConfigurator\serializers\JsonSerializer;
use LTDBeget\sphinxConfigurator\serializers\PlainSerializer;

$config_path  = "path/to/your/config/file";
$plain_config = file_get_contents($config_path);

// Parsing configuration to configuration file object
$config = PlainSerializer::deserialize($plain_config);


// check config
$config->validate();

// is has settings blocks
$config->isHasCommon();
$config->isHasIndexer();
$config->isHasSearchd();

// get settings block (create if don't exists)
$common  = $config->getCommon();
$indexer = $config->getIndexer();
$searchd = $config->getSearchd();


// work with common settings
// get option appender, class that creates and appends all possible options for common
$appender = $common->getOptionAppender();
// example of option add
$appender->addJsonAutoconvKeynames("option value");

// iterate via all options
foreach($common->iterateOptions() as $option) {
    // option data
    $option->getName();
    $option->getValue();

    // modify value
    $option->setValue("new value");

    // remove option from
    $option->delete();
}

// work with indexer settings
// get option appender, class that creates and appends all possible options for indexer
$appender = $indexer->getOptionAppender();
// example of option add
$appender->addMaxFileFieldBuffer("option value");

// iterate via all options
foreach($indexer->iterateOptions() as $option) {
    // option data
    $option->getName();
    $option->getValue();

    // modify value
    $option->setValue("new value");

    // remove option from
    $option->delete();
}

// work with searchd settings
// get option appender, class that creates and appends all possible options for indexer
$appender = $searchd->getOptionAppender();
// example of option add
$appender->addBinlogMaxLogSize("option value");

// iterate via all options
foreach($searchd->iterateOptions() as $option) {
    // option data
    $option->getName();
    $option->getValue();

    // modify value
    $option->setValue("new value");

    // remove option from
    $option->delete();
}

// iterate via sources
foreach($config->iterateSource() as $source) {
    // source name
    $source->getName();
    // is has inheritance
    if($source->isHasInheritance()) {
        $source->getInheritanceName();
    }

    // get option appender, class that creates and appends all possible options for source
    $appender = $source->getOptionAppender();
    // example of option add
    $appender->addHookPostIndex("option value");


    // iterate via all options
    foreach($source->iterateOptions() as $option) {
        // option data
        $option->getName();
        $option->getValue();

        // modify value
        $option->setValue("new value");

        // remove option from
        $option->delete();
    }
}

// iterate via indexes
foreach($config->iterateIndex() as $index) {
    // source name
    $index->getName();
    // is has inheritance
    if($index->isHasInheritance()) {
        $index->getInheritanceName();
    }

    // get option appender, class that creates and appends all possible options for index
    $appender = $index->getOptionAppender();
    // example of option add
    $appender->addAgent("option value");

    // iterate via all options
    foreach($index->iterateOptions() as $option) {
        // option data
        $option->getName();
        $option->getValue();

        // modify value
        $option->setValue("new value");

        // remove option from
        $option->delete();
    }
}

// serialize object to plain configuration
$plain_config = PlainSerializer::serialize($config);

// serialize object to array
$array_config = ArraySerializer::serialize($config);
// deserialize array to object from array serialized configuration file 
ArraySerializer::deserialize($array_config);

// serialize object to json encoded string
$json_config  = JsonSerializer::serialize($config);
// deserialize json to object from json serialized configuration file
JsonSerializer::deserialize($json_config);
```

## Docker
install docker and docker-compose

Go to docker 
```shell
cd docker
```

Build image
```shell
docker-compose build
```

Check concrete config from stubs directory via sphinx indextool
```shell
docker-compose run --rm sphinx indextool --checkconfig -c /etc/sphinxsearch/valid.example.conf
```

## Regenerate documentation
```shell
$ ./vendor/bin/phpdox
```

## Notes
list of options was generated from docs of Sphinx 2.2.10-release 
[see manual](http://sphinxsearch.com/docs/current.html)

## License

sphinx-configurator is released under the MIT License.
See the [bundled LICENSE file](LICENSE) for details.
