# GuideStar QuickStart PHP

GuideStar QuickStart APIs are free APIs intended to provide developers with an easy way to experiment with the integration of GuideStar data into existing applications.

[![Latest Stable Version](https://poser.pugx.org/kevinem/guidestar-quickstart-php/v/stable?format=flat-square)](https://packagist.org/packages/kevinem/guidestar-quickstart-php)
[![License](https://poser.pugx.org/kevinem/guidestar-quickstart-php/license?format=flat-square)](https://packagist.org/packages/kevinem/guidestar-quickstart-php)
[![Build Status](https://travis-ci.org/kevinem/guidestar-quickstart-php.svg?branch=master)](https://travis-ci.org/kevinem/guidestar-quickstart-php)

## Installation

To install, use composer:

```
composer require kevinem/guidestar-quickstart-php
```

## Documentation

https://community.guidestar.org/docs/DOC-1867

### Example Usage

Note: Using apiKey takes precedence over username and password.

```php
$quickStartDetail = new QuickStartDetail(new \GuzzleHttp\Client(), ['apiKey' => 'your_api_key']);
$quickStartDetail->getOrganizationDetail(7831216);

$quickStartDetail = new QuickStartDetail(new \GuzzleHttp\Client(), ['username' => 'your_username', 'password' => 'your_password']);
$quickStartDetail->getOrganizationDetail(7831216);

$quickStartSearch = new QuickStartSearch(new \GuzzleHttp\Client(), ['apiKey' => 'your_api_key']);
$quickStartSearch->searchEIN('54-1774039');
```

## License 

The MIT License (MIT)
Copyright (c) 2017 Kevin Em

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation
the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of
the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
IN THE SOFTWARE.
