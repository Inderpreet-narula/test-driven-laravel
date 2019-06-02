<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Tests\ParentTestClass;

class UserTest extends ParentTestClass
{
    use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
    public function getUser() {
        $user = User::whereNotNull('id')->first();
        return $user;
    }
    
    public function testExample()
    {
        $this->assertTrue(true);
    }
    
    public function testCreateUser()
    {
        $user = new User;
        $user->name = $this->faker->name;
        $user->email = $this->faker->safeEmail;
        $user->password = $this->faker->password;
        $user->save();
        $this->assertInstanceOf(User::class, $user);
    }
    
    public function testValidateIncorrectEmail()
    {
        $user = self::getUser();
        $user->name = $this->faker->name;
        $user->email = $this->faker->word;
        $user->password = $this->faker->password;
        $user->save();
        $this->assertArrayHasKey('email', $user->getErrors()->toArray());
    }
}
