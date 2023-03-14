<?php

namespace Tests\Feature;

<<<<<<< HEAD
=======
use App\Models\User;
>>>>>>> 97bb52153a5aca2541c2f8338d792f6977c2feae
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
<<<<<<< HEAD
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
=======
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
>>>>>>> 97bb52153a5aca2541c2f8338d792f6977c2feae
    }
}
