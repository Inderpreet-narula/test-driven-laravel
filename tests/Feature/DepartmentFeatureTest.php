<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartmentFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function  testAddDepartment()
    {
        $department_data = ['name' => 'PHP', 'size' => 2];
        $response = $this->post('/department', $department_data);
        $response->assertStatus(201);
    }
}
