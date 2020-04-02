# michelmelo/dpd-track-trace
#### DPD Tracking (Portugal post office) tracking for PHP.

track mail and packages using DPD service (Portuguese post office)
https://dpd.pt/track-and-trace

## Requirements

PHP 5.6 or higher.

## Installation

Include michelmelo/dpd-track-trace in your project, by adding it to your composer.json file.
```php
{
    "require": {
        "michelmelo/dpd-track-trace": "1.*"
    }
}
```


## Usage

```php
$dpd = new \MichelMelo\Dpd\DpdTracking();
$res = $dpd->trackObjects(['ED123456789PT', 'LX123456789PT']);
var_dump($res);
```

```php
/*
output:
Array
(
    [ED123456789PT] => Array
        (
            [status] => 6
            [statusText] => Objeto não encontrado
        )

    [LX123456789PT] => Array
        (
            [status] => 4
            [statusText] => Objeto entregue
        )

)
*/
```

## ChangeLog

 - initial release

## Contributing

 - welcome to discuss a bugs, features and ideas.

## License

michelmelo/dpd-track-trace is release under the MIT license.

You are free to use, modify and distribute this software
