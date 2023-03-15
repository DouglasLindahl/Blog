<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Psy\Util\Str;
use Nette\Utils\Random;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

function csrf_token()
{
    return app('session')->token();
}

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

    // $user = User::factory()->create(['username' => 'Test', 'password' => bcrypt($password = '123')]);
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
