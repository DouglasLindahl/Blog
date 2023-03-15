<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterNewUserTest extends TestCase
{
    public function test_user_registration()
    {
        $user = [
            'username' => 'TestUser',
            'password' => 'passwordtest'
        ];

        $response = $this->post('/registerAccount', $user, [
            '_token' => csrf_token()
        ]);

        $response->assertRedirect('/');
    }
}
