<?php

namespace AminSamadzadeh\EloquentTablePrefix\Tests;

use Orchestra\Testbench\TestCase as BaseTest;
use AminSamadzadeh\EloquentTablePrefix\Model as BaseModel;

class TestCase extends BaseTest
{

}

class Category extends BaseModel
{
    protected $fillable = ['name', 'parent_id'];
    public $prefix = 'test';
    public $timestamps = false;
}

class CategoryWithoutPrefix extends BaseModel
{
    protected $fillable = ['name', 'parent_id'];
    public $timestamps = false;
}
