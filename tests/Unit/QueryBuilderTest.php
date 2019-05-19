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
    
    public function testSelectAllWithLimit() {
        $sql = new QueryBuilderComponent;
        $this->assertEquals('select * from products limit 10', $sql->select('products', 10));
    }
    
    public function testSelectAllWithLimitAndOffset() {
        $sql = new QueryBuilderComponent;
        $this->assertEquals('select * from products limit 6 offset 5', $sql->select('products', [6, 5]));
    }
    
    public function testSelectAllWithTotalCount() {
        $sql = new QueryBuilderComponent;
        $this->assertEquals('select *, count("id") from products', $sql->select('products', ['count','id']));
    }
    
    public function testSelectMaxColumn() {
        $sql = new QueryBuilderComponent;
        $this->assertEquals('select max(\'cost\') from products', $sql->select('products', ['max','cost']));
    }
    
    public function testSelectMaxColumnWithGroupBy() {
        $sql = new QueryBuilderComponent;
        $this->assertEquals('select max(\'cost\') from products group by cost', $sql->select('products', ['group by','cost']));
    }
    
    public function testSelectDistinctColumn() {
        $sql = new QueryBuilderComponent;
        $this->assertEquals('select DISTINCT \'name\' from products', $sql->select('products', ['DISTINCT','name']));
    }
    
    public function testSelectJoinedTableColumns() {
        $sql = new QueryBuilderComponent;
        $this->assertEquals('select * from products join categories on products.category_id=categories.id', $sql->select('products', 'categories', ['id', 'category_id']));
    }
}
