#Eloquent Table Prefix
With this package you can add prefix to your tables.

## Installing
just run below command:
```sh
composer require aminsamadzadeh/eloquent-prefix-table
```

## Usage

```php
<?php

namespace App\Models;
use AminSamadzadeh\EloquentTablePrefix\Model as BaseModel;

class Category extends BaseModel
{
    public $prefix = 'shop';
}
```