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
