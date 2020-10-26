<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('login');

        $response->assertStatus(200);
    }

    public function testLogin()
    {
        $response = $this->post('login', [
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        $response->assertStatus(201);
    }
}
