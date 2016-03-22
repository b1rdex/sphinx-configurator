# sphinx-configurator

[![Latest Stable Version](https://poser.pugx.org/ltd-beget/sphinx-configurator/version)](https://packagist.org/packages/ltd-beget/sphinx-configurator) 
[![Total Downloads](https://poser.pugx.org/ltd-beget/sphinx-configurator/downloads)](https://packagist.org/packages/ltd-beget/sphinx-configurator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LTD-Beget/sphinx-configurator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LTD-Beget/sphinx-configurator/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/LTD-Beget/sphinx-configurator/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/LTD-Beget/sphinx-configurator/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/LTD-Beget/sphinx-configurator/badges/build.png?b=master)](https://scrutinizer-ci.com/g/LTD-Beget/sphinx-configurator/build-status/master)
[![Documentation](https://img.shields.io/badge/code-documented-brightgreen.svg)](http://ltd-beget.github.io/sphinx-configurator/documentation/html/index.html)
[![Documentation](https://img.shields.io/badge/code-coverage-brightgreen.svg)](http://ltd-beget.github.io/sphinx-configurator/coverage/)
[![License MIT](http://img.shields.io/badge/license-MIT-blue.svg?style=flat)](https://github.com/LTD-Beget/sphinx-configurator/blob/master/LICENSE)


Php library for parsing and editing sphinx.conf files programmatically with high level abstraction.

## Installation

```shell
composer require ltd-beget/sphinx-configurator
```

## Sphinx version

The library supports the following versions of sphinx:

* [2.2.10](http://sphinxsearch.com/docs/current.html)
* [2.2.8](http://sphinxsearch.com/docs/archives/manual-2.2.8.html)
* [2.2.6](http://sphinxsearch.com/docs/archives/manual-2.2.6.html)
* [2.2.5](http://sphinxsearch.com/docs/archives/manual-2.2.5.html)
* [2.2.4](http://sphinxsearch.com/docs/archives/manual-2.2.4.html)
* [2.2.3](http://sphinxsearch.com/docs/archives/manual-2.2.3.html)
* [2.2.2](http://sphinxsearch.com/docs/archives/manual-2.2.2.html)
* [2.2.1](http://sphinxsearch.com/docs/archives/manual-2.2.1.html)
* [2.1.9](http://sphinxsearch.com/docs/archives/manual-2.1.9.html)
* [2.1.8](http://sphinxsearch.com/docs/archives/manual-2.1.8.html)
* [2.1.7](http://sphinxsearch.com/docs/archives/manual-2.1.7.html)
* [2.1.6](http://sphinxsearch.com/docs/archives/manual-2.1.6.html)
* [2.1.5](http://sphinxsearch.com/docs/archives/manual-2.1.5.html)
* [2.1.4](http://sphinxsearch.com/docs/archives/manual-2.1.4.html)
* [2.1.3](http://sphinxsearch.com/docs/archives/manual-2.1.3.html)
* [2.1.2](http://sphinxsearch.com/docs/archives/manual-2.1.2.html)
* [2.1.1](http://sphinxsearch.com/docs/archives/manual-2.1.1.html)

## Usage

### work with documentation informer

This class give you full information about concrete option.
You can use it separately if you need. 

```php
<?php
    require './vendor/autoload.php';
    
    use LTDBeget\sphinx\enums\eSection;
    use LTDBeget\sphinx\enums\eVersion;
    use LTDBeget\sphinx\enums\options\eIndexerOption;
    use LTDBeget\sphinx\informer\Informer;
    
    // chose version
    $version = eVersion::V_2_2_10();
    
    // get options help informer
    $informer = Informer::get($version);
    
    // chose section
    $section = eSection::INDEXER();
    
    // check is known option type
    // useful only for version 2.1.9 and lower for section common
    $informer->isSectionExist($section); 
    
    
    // see all options info
    foreach ($informer->iterateOptionInfo($section) as $optionInfo) {
        $optionInfo->getName();
        $optionInfo->getDescription();
        $optionInfo->getDocLink();
        $optionInfo->getVersion();
        $optionInfo->getSection();
        $optionInfo->isIsMultiValue();
    }
    
    // concrete option
    
    $option = eIndexerOption::LEMMATIZER_CACHE();
    // is option exist in current version
    $informer->isKnownOption($section, $option);
    
    // is option permanently removed from newer version of Sphinx
    $informer->isRemovedOption($section, $option);
    
    // see concrete option info
    $optionInfo = $informer->getOptionInfo($section, $option);
    $optionInfo->getName();
    $optionInfo->getDescription();
    $optionInfo->getDocLink();
    $optionInfo->getVersion();
    $optionInfo->getSection();
    $optionInfo->isIsMultiValue();
```

### work with configuration object
```php
<?php
require './vendor/autoload.php';

    use LTDBeget\sphinx\configurator\Configuration;
    use LTDBeget\sphinx\enums\eVersion;
    use LTDBeget\sphinx\enums\options\eIndexOption;
    use LTDBeget\sphinx\enums\options\eSearchdOption;
    use LTDBeget\sphinx\enums\options\eSourceOption;
    
    // chose version
    $version = eVersion::V_2_2_10();
    
    // get content of your configuration file
    $path_to_configuration = __DIR__. '/sphinx/conf/valid.example.conf';
    $content = file_get_contents($path_to_configuration);
    
    
    // create object from string
    // if your configuration is valid it will be deserialized into the object
    // note that if your configuration has options which 
    // was permanently removed from newer versions of sphinx
    // they will be ignored
    $configuration = Configuration::fromString($content, $version);
    
    // if you want, you can store the configuration in different formats
    $as_array = $configuration->toArray();
    $as_json  = $configuration->toJson();
    
    // if you need to make sphinx conf file content cast object to string
    $as_plain = (string) $configuration;
    
    // configuration object serialized as array or json can be deserialized
    $configuration = Configuration::fromArray($as_array, $version);
    $configuration = Configuration::fromJson($as_json, $version);
    
    // or you can create empty object and fill it yourself
    $configuration = new Configuration($version);
    
    // adding source sections
    $source = $configuration->addSource('source1');
    $source->addOption(eSourceOption::TYPE(), 'mysql');
    
    $source = $configuration->addSource('source2', 'source1');
    $source->addOption(eSourceOption::TYPE(), 'pgsql');
    
    // is section has inheritance
    $source->isHasInheritance();
    
    // get parent section object
    $source->getInheritance();
    
    // note that sphinx has multi value options (MVA)
    // if you add twice or more times MVA option each time new option wil added
    $source->addOption(eSourceOption::XMLPIPE_ATTR_MULTI_64(), '1234567890');
    $source->addOption(eSourceOption::XMLPIPE_ATTR_MULTI_64(), '0987654321');
    
    // but if you add not MVA option twice, newer option erases older
    $source->addOption(eSourceOption::CSVPIPE_DELIMITER(), '|'); // will be erased
    $source->addOption(eSourceOption::CSVPIPE_DELIMITER(), '.'); // this is set in configuration
    
    // adding index sections
    $source = $configuration->addIndex('index1');
    $source->addOption(eIndexOption::SOURCE(), 'source1');
    
    $source = $configuration->addIndex('index2', 'index1');
    $source->addOption(eIndexOption::SOURCE(), 'source2');
    
    // check is has settings sections
    $configuration->isHasCommon();
    $configuration->isHasSearchd();
    $configuration->isHasIndexer();
    
    // get settings section (it will be created if doesn't exists)
    $searchd = $configuration->getSearchd();
    
    // add option to settings
    $searchd->addOption(eSearchdOption::LISTEN(), '9312');
    
    // for indexer and common work is same
    $indexer = $configuration->getIndexer();
    $common  = $configuration->getCommon();
    
    // each section can be deleted.
    // note, if you delete section that is parent to some one, its child will be removed too.
    $common->delete();
    
    
    // iterating and manipulation with options
    
    // index and source is multiple sections
    // for iterating via it use iterateSource() or iterateIndex()
    foreach($configuration->iterateSource() as $section) {
        foreach ($section->iterateOptions() as $option) {
            $option->getInfo();
            $option->getName();
            $option->getValue();
    
            if($option->getValue() === 'pgsql' && $option->getName()->is(eSourceOption::TYPE())) {
                $option->delete();
            }
    
            if($option->getValue() === 'mysql' && $option->getName()->is(eSourceOption::TYPE())) {
                $option->setValue('pgsql');
            }
        }
    }
    
    // searchd, indexer and common is single section
    // so iterate via options like this
    foreach($configuration->getIndexer()->iterateOptions() as $option) {
        $option->getInfo();
        $option->getName();
        $option->getValue();
    }
    
    // and now, cast to string and see your brilliant configuration ;)
    echo $configuration;
```

### Sphinx configuration tokenize only
if you want only tokenize sphinx configuration you can use this [library](https://github.com/LTD-Beget/sphinx-configuration-tokenizer) 


### Developers

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

### Run tests

```shell
$ php phpunit.phar --coverage-html coverage
```

## License

sphinx-configurator is released under the MIT License.
See the [bundled LICENSE file](LICENSE) for details.
