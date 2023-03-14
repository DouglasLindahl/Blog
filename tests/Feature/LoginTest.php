<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /* public function test_view_login_form()
    {
        $response = $this->get('/');
        $response->assertSeeText('Username');
        $response->assertSeeText('Password');

        $response->assertStatus(200);
    } */
    public function test_login_without_password()
    {
        $this->followingRedirects();
        $response = $this->get('/');
        $response->assertSeeText('Wrong username or password. Please try again!');
        $response->assertStatus(200);
    }
}
