<?php

namespace AminSamadzadeh\EloquentTablePrefix\Tests;

class FeatureTest extends TestCase
{
    /** @test */
    public function getTableTest()
    {
    	$category = new Category;
    	$table = $category->getTable();
        $this->assertEquals($table, 'test_categories');
    }

    /** @test */
    public function getTableNotSetPrefixTest()
    {
    	$category = new CategoryWithoutPrefix;
    	$table = $category->getTable();
    	$this->assertEquals($table, 'category_without_prefixes');
    }

    /** @test */
    public function getJoiningTablePrefixTest()
    {
    	$category = new Category;
    	$table = $category->joiningTable('post');
        $this->assertEquals($table, 'test_category_post');
    }

    /** @test */
    public function getJoiningTableNotSetPrefixTest()
    {
    	$category = new CategoryWithoutPrefix;
    	$table = $category->joiningTable('post');
        $this->assertEquals($table, 'category_without_prefix_post');
    }
}
