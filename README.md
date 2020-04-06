# michelmelo/dpd-track-trace
#### DPD Tracking (Portugal post office) tracking for PHP.

track mail and packages using DPD service (Portuguese post office)
https://dpd.pt/track-and-trace

## Requirements

PHP 5.6 or higher.

## Installation
Add this to your composer.json file, in the require object:

```javascript
"michelmelo/dpd-track-trace": "1.0.*"
```
After that, run composer install to install the package.
Add the service provider to `config/app.php`, within the `providers` array.

```php
'providers' => array(
    // ...
    michelmelo\dpdtracking\DpdTrackingServiceProvider::class,
)
```
Publish the config file.
```
php artisan vendor:publish
```



## Usage

```php

use michelmelo\dpdtracking\DpdTracking;

$dpd = new DpdTracking();
$res = $dpd->trackObjects(['09711514666666V', 'LX123456789PT']);
var_dump($res);
```

```php
/*
output:
array:1 [
  "09711514666666V" => array:11 [
    0 => array:5 [
      0 => "410"
      1 => "2020/04/06 09:32"
      2 => "Envio em armazém"
      3 => ""
      4 => ""
    ]
    1 => array:5 [
      0 => "403"
      1 => "2020/04/04 18:27"
      2 => "Retorno armazém (pára AEP)"
      3 => ""
      4 => ""
    ]
  ]
]
*/
```

## ChangeLog

 - initial release

## Contributing

 - welcome to discuss a bugs, features and ideas.

## License

michelmelo/dpd-track-trace is release under the MIT license.

You are free to use, modify and distribute this software
