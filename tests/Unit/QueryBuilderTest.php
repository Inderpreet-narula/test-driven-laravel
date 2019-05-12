<?php

namespace Tests\Unit;

use App\Components\QueryBuilderComponent;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QueryBuilderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSelectAllColumns()
    {
        $sql = new QueryBuilderComponent;
        $this->assertEquals('select * from products', $sql->select('products'));
    }
    
    public function testSelectSpecificColumns() {
        $sql = new QueryBuilderComponent;
        $this->assertEquals('select id, name from products', $sql->select('products', ['id', 'name']));
    }
    
    public function testSelectSpecificColumnsWithOrderByOnColumn() {
        $sql = new QueryBuilderComponent;
        $this->assertEquals('select id, name from products order by id desc', $sql->select('products', ['id', 'name'], ['id', 'desc']));
    }
    
    public function testSelectSpecificColumnsWithOrderByOnMultipleColumns() {
        $sql = new QueryBuilderComponent;
        $this->assertEquals('select * from products order by name asc, category asc', $sql->select('products', [['name', 'asc'],['category','asc']]));
    }
    
    public function testSelectSpecificColumnsWithOrderByAndCapitalizedKeyword() {
        $sql = new QueryBuilderComponent;
        $this->assertEquals('SELECT id, name FROM products ORDER BY id DESC', $sql->select('products', ['id', 'name'], ['id', 'DESC']));
    }
}
