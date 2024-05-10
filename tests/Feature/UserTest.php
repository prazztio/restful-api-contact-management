<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testRegisterSuccess()
    {
        $this->post('/api/users', [
            'username' => 'pras',
            'password' => 'rahasia',
            'name' => 'andreas prasetio'
        ])->assertStatus(201)
            ->assertJson([
                "data" => [
                    'username' => 'pras',
                    'name' => 'andreas prasetio'
                ]
            ]);
    }

    public function testRegisterFailed()
    {

    }

    public function testRegisterUsernameAlreadyExist()
    {

    }
}
