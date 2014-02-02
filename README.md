Seriesly API SDK.
========
Not official SDK.


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
use Naxhh\Seriesly\Client;
use Naxhh\Seriesly\Adapter\Base as Executor;

$app_id        = 'your series.ly app id';
$secret_key    = 'your secret key';
$http_executor = new Executor();

$client = Client::create( $app_id, $secret_key, $http_executor )
```

## TODO

This is still under development, a lot of things can change:

- [ ] Enable locale selecting.

## Testing

``` bash
$ ./bin/phpunit
```

## Credits

- [Ignacio Tolstoy](https://github.com/naxhh)


## License

The MIT License (MIT). Please see [License File](https://github.com/naxhh/seriesly/blob/master/LICENSE).