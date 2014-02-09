Seriesly API SDK.
========
Not official SDK.

[![Build Status](https://travis-ci.org/naxhh/seriesly.png?branch=master)](https://travis-ci.org/naxhh/seriesly)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/naxhh/seriesly/badges/quality-score.png?s=9aa8539768073849e9aa9adfc64f6164b3ef4fbb)](https://scrutinizer-ci.com/g/naxhh/seriesly/)


## Why?
Pending to write.

## Install

Via Composer

``` json
{
    "require": {
        "naxhh/seriesly": "@dev"
    }
}
```

## Usage

``` php
use Naxhh\Seriesly\ClientFactory;
use Naxhh\Seriesly\Adapter\Base as Executor;

$app_id        = 'your series.ly app id';
$secret_key    = 'your secret key';
$http_executor = new Executor();

$client = ClientFactory::create($app_id, $secret_key, $http_executor)
```

## TODO

This is still under development, a lot of things can change:

- [ ] Enable locale selecting for medias.
- [ ] Document classes.

## Testing

``` bash
$ ./bin/phpunit
```

## Credits

- [Ignacio Tolstoy](https://github.com/naxhh)


## License
The MIT License (MIT). Please see [License File](https://github.com/naxhh/seriesly/blob/master/LICENSE).
