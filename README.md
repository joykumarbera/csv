# Bera Csv #
a wrapper for generate csv files


### Installation ####

Use composer to install Bera Csv.

```bash
composer require bera/csv
```

### Usage ###
```php

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

use Bera\Csv\Csv;

$csv = new Csv(__DIR__ , 'test.csv');
$csv->addHeader(array('a','b','c'));
$csv->addData(
    array(
        array(1,3,4),
        array(2,4,5),
        array(6,8,9),
    )
);
$csv->generate();
```



## License
This software under MIT Licence
