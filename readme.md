#boolean-expressions
[![Build Status](https://travis-ci.org/paslandau/boolean-expressions.svg?branch=master)](https://travis-ci.org/paslandau/boolean-expressions)

Abstraction of boolean expressions for flexible evaluation within PHP code

##Description
[todo]

##Requirements

- PHP >= 5.5

##Installation

The recommended way to install boolean-expressions is through [Composer](http://getcomposer.org/).

    curl -sS https://getcomposer.org/installer | php

Next, update your project's composer.json file to include BooleanExpressions:

    {
        "repositories": [ { "type": "composer", "url": "http://packages.myseosolution.de/"} ],
        "minimum-stability": "dev",
        "require": {
             "paslandau/boolean-expressions": "dev-master"
        }
    }

After installing, you need to require Composer's autoloader:
```php

require 'vendor/autoload.php';
```