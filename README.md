A PHP package for Laravel developers which allows them to generate custom-format IDs for any model.

## How to install?
```
composer require muktar-sayedsaleh/laravel-custom-ids-generator
```

## How to use?

```php
use MuktarSayedSaleh\LaravelCustomIds\IdsGenerator;
use App\Models\User;

$generator = new IdsGenerator(
    User
);
$id = $generator->next();

// Use the generated ID ($id) however you want.
```

### IdsGenerator Parameters:
1. $model: The laravel model class (Required).
2. $prefix: The desired prefix if any (Optional, default value: '').
3. $suffix: The desired suffix if any (Optional, default value: '').
4. $sequence_length: The desired length of the sequence number (Optional, default value: 6).
5. $format: The desired format of the generated ID (Optional, default value: '{prefix}{sequence}{suffix}').
    Accepted placeholders are:
    `{prefix}` the prefix
    `{suffix}` the suffix
    `{sequence}` the sequence number
    `{Y}` The year in YYYY format
    `{y}` The year in YY format
    `{F}` The month in January through December format
    `{M}` A short textual representation of a month, three letters: Jan through Dec
    `{m}` Numeric representation of a month, with leading zeros: 01 through 12
    `{n}` Numeric representation of a month, without leading zeros: 1 through 12
    `{l}` A textual representation of a day, three letters: Sunday through Saturday
    `{D}` A textual representation of a day, three letters: Mon through Sun
    `{d}` Day of the month, 2 digits with leading zeros: 01 to 31
    `{j}` Day of the month without leading zeros: 1 to 31
    `anyothertext` Will be rendered as is
6. $unique_field_name: A field of the $model model, which the function will compare against to make sure that the generated ID is not used before.

### Advace Examples:

#### Custom prefix:
```php
TODO
```
#### Custom suffix:
```php
TODO
```
#### Custom length:
```php
TODO
```
#### Custom format:
```php
TODO
```
#### With uniquness check:
```php
TODO
```
