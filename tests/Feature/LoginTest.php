<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_form()
    {
        $response = $this->get('/');
        $response->assertSeeText('Username');
        $response->assertSeeText('Password');
        $response->assertStatus(200);
    }

    public function test_view_registration_form()
    {
        $response = $this->get('/register');
        $response->assertSeeText('Username');
        $response->assertSeeText('Password');
        $response->assertStatus(200);
    }

    public function test_user_registration()
    {
        $response = $this->post('/registerAccount', [
            'username' => 'Billy',
            'password' => '123',
        ]);

        $this->assertDatabaseHas('users', ['username' => 'Billy']);

        $response->assertRedirect('/');
    }

    public function test_login_user()
    {
        $user = new User();
        $user->username = 'Billy';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->post('/login', [
            'username' => 'Billy',
            'password' => '123',
        ]);

        $response->assertRedirect('/dashboard');
    }

    public function test_login_without_password()
    {
        $response = $this->followingRedirects()->post('/login', [
            'username' => 'example'
        ]);
        $response->assertStatus(200);
    }
}
