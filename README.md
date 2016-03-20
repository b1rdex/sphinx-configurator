# sphinx-configurator

[![Latest Stable Version](https://poser.pugx.org/ltd-beget/sphinx-configurator/version)](https://packagist.org/packages/ltd-beget/sphinx-configurator) 
[![Total Downloads](https://poser.pugx.org/ltd-beget/sphinx-configurator/downloads)](https://packagist.org/packages/ltd-beget/sphinx-configurator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LTD-Beget/sphinx-configurator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LTD-Beget/sphinx-configurator/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/LTD-Beget/sphinx-configurator/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/LTD-Beget/sphinx-configurator/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/LTD-Beget/sphinx-configurator/badges/build.png?b=master)](https://scrutinizer-ci.com/g/LTD-Beget/sphinx-configurator/build-status/master)
[![Documentation](https://img.shields.io/badge/code-documented-brightgreen.svg)](http://ltd-beget.github.io/sphinx-configurator/documentation/html/index.html)
[![Documentation](https://img.shields.io/badge/code-coverage-brightgreen.svg)](http://ltd-beget.github.io/sphinx-configurator/coverage/)
[![License MIT](http://img.shields.io/badge/license-MIT-blue.svg?style=flat)](https://github.com/LTD-Beget/sphinx-configurator/blob/master/LICENSE)


Php library for parsing and editing sphinx.conf files. pragmatically with high level abstraction

## Installation

```shell
composer require voksiv/sphinx-configurator
```
R
## Usage
```php

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

### Run tests

```shell
$ wget https://phar.phpunit.de/phpunit.phar
```

```shell
$ php phpunit.phar --coverage-html coverage
```


## Notes
list of options was generated from docs of Sphinx 2.2.10-release 
[see manual](http://sphinxsearch.com/docs/current.html)

## License

sphinx-configurator is released under the MIT License.
See the [bundled LICENSE file](LICENSE) for details.
