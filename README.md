# cast
Safely cast mixed values to scalar types or null.

Used to provide safe casts of scalar values and DateTime in PHP, avoiding PHPSTAN issues when casting 'mixed' values that do not convert as expected.

For a better understanding of the problem, take a look at the PHPSTAN issue 9295:
https://github.com/phpstan/phpstan/issues/9295


## Documentation
-------------
### Installation
```bash
composer require xactsystems/cast
```

### Usage
```php
<?php

declare(strict_types=1);

namespace Xact\Cast;

use DateTime;
use Xact\Cast\Cast;

class Test
{
    protected int $myInt;
    protected ?int $myNullInt;
    protected float $myFloat;
    protected ?float $myNullFloat;
    protected string $myString;
    protected ?string $myNullString;
    protected bool $myBool;
    protected ?bool $myNullBool;
    protected ?array $myNullArray;
    protected ?object $myNullObject;
    protected ?DateTime $myNullDateTime;

    public function testCast(mixed $value, mixed $nullValue = null): void
    {
        $this->myInt = Cast::intval($value);
        $this->myNullInt = Cast::nullInt($nullValue);
        $this->myFloat = Cast::nullFloat($value);
        $this->myNullFloat = Cast::nullFloat($nullValue);
        $this->myString = Cast::strval($value);
        $this->myNullString = Cast::nullString($nullValue);
        $this->myBool = Cast::boolval($value);
        $this->myNullBool = Cast::nullBool($nullValue);
        $this->myNullArray = Cast::nullArray($nullValue);
        $this->myNullObject = Cast::nullObject($nullValue);
        $this->myNullDateTime = Cast::nullDateTime($nullValue);
    }
}
````

## Methods
### static Cast::intval(mixed $value): int
Cast $value to an int.

Throws \InvalidArgumentException if $value is not one of array, bool, float, int, resource, string, null.

#### static floatval(mixed $value): float
Cast $value to a float.

Throws \InvalidArgumentException if $value is not one of array, bool, float, int, string, null.

#### static strval(mixed $value): string
Cast $value to a float.

Throws \InvalidArgumentException if $value is not one of bool, float, int, resource, string, null.

#### static boolval(mixed $value): bool
Cast $value to a float.

Throws \InvalidArgumentException if $value is not one of array, bool, float, int, string, null.

#### static nullInt(mixed $value): ?int
Cast $value to int|null.

Throws \InvalidArgumentException if $value is not one of array, bool, float, int, resource, string, null.

#### static nullFloat(mixed $value): ?float
Cast $value to float|null.

Throws \InvalidArgumentException if $value is not one of array, bool, float, int, string, null.

#### static nullString(mixed $value): ?string
Cast $value to string|null.

Throws \InvalidArgumentException if $value is not one of bool, float, int, resource, string, null.

#### static nullBool(mixed $value): ?bool
Cast $value to bool|null.

Throws \InvalidArgumentException if $value is not one of array, bool, float, int, string, null.

#### static nullArray(mixed $value): ?array
Cast $value to array|null.

See https://www.php.net/manual/en/language.types.array.php#language.types.array.casting

#### static nullObject(mixed $value): ?object
Cast $value to object|null.

See See https://www.php.net/manual/en/language.types.object.php#language.types.object.casting

#### static nullDateTime(mixed $value): ?DateTime
Cast $value to DateTime|null.

Throws \InvalidArgumentException if $value is not one of bool, float, int, resource, string, null.
See https://www.php.net/manual/en/datetime.construct.php for valid DateTime string formats.
