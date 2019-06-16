<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Product;
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
        $user->password = $this->faker->password(6, 8);
        $user->save();
        $this->assertInstanceOf(User::class, $user);
        return $user->id;
    }
    
    public function testValidateIncorrectEmail()
    {
        $user = self::getUser();
        $user->name = $this->faker->name;
        $user->email = $this->faker->word;
        $user->password = $this->faker->password(6, 8);
        $user->save();
        $this->assertArrayHasKey('email', $user->getErrors()->toArray());
    }
    
    public function testUniqueNamePasswordLimit()
    {
        $user = new User;
        $existing_user = self::getUser();
        $user->name = $existing_user->name;
        $user->email = $this->faker->safeEmail;
        $user->password = $this->faker->password(10, 10);
        $user->save();
        $this->assertArrayHasKey('name', $user->getErrors()->toArray());
        $this->assertArrayHasKey('password', $user->getErrors()->toArray());
    }
    
    /**
     * @depends testCreateUser
     */
    
    public function testCreateProduct($user_id)
    {
        $product = new Product;
        $product->name = $this->faker->word;
        $product->created_by = $user_id;
        $product->save();
        $this->assertInstanceOf(Product::class, $product);
    }
}
