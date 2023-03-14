<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    function test_view_login_form()
    {
        $response = $this->get('/');
        $response->assertSeeText('username');
        $response->assertStatus(200);
    }
    function test_login_user()
    {
        $user = new User();
        $this->followingRedirects();
        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'password',
        ]);
        $response->assertSee($user->username);
    }
    function test_login_user_without_password()
    {
        $this->followingRedirects();
        $response = $this->get('/');
        $response->assertSeeText('Wrong username or password');
    }
}
