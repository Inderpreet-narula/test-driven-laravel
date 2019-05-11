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
}
