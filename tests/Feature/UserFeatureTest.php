<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserFeatureTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Hello Ucreate');
    }

    public function testRegisterForm()
    {
        $response = $this->get('/');
        $response->assertSee('Register');
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Register');
    }

    public function testAddUser()
    {        
        $data = ['name' => $this->faker->name,
                'email' => $this->faker->safeEmail,
                'password' => $this->faker->password];
        $response = $this->post('/register', $data);
        //in progress
        $response->assertStatus(200);
    }
}
