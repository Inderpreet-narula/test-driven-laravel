<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testHelloWorld() {
    	$this->assertTrue(true);
    	$this->assertFalse(false);
    	$this->assertEquals(10, 10);
    }
}
