#BooleanExpressions
[![Build Status](https://travis-ci.org/paslandau/BooleanExpressions.svg?branch=master)](https://travis-ci.org/paslandau/BooleanExpressions)

Abstraction of boolean expressions for flexible evaluation within PHP code

##Description
[todo]

##Requirements

- PHP >= 5.5

##Installation

The recommended way to install BooleanExpressions is through [Composer](http://getcomposer.org/).

    curl -sS https://getcomposer.org/installer | php

Next, update your project's composer.json file to include BooleanExpressions:

    {
        "repositories": [
            {
                "type": "git",
                "url": "https://github.com/paslandau/BooleanExpressions.git"
            }
        ],
        "require": {
             "paslandau/BooleanExpressions": "~0"
        }
    }

After installing, you need to require Composer's autoloader:
```php

require 'vendor/autoload.php';
```