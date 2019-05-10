<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Components\Users;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateUserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUserHasName() {
    	$user = new Users('Inder');
    	$this->assertEquals('Inder', $user->name());
    }

    public function testUserAge() {
    	$user = new Users('Inder', '20');
    	$this->assertEquals(20, $user->age());
    }
}
