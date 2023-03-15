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

class DeletePostTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_blogpost_with_button()
    {
        $user = new User();
        $user->username = 'Billy';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->patch('/post/{blogPost}/delete', [
            'username' => 'Billy',
            'password' => '123',
        ]);

        $response->assertRedirect('/');
        $response->assertStatus(302);
    }
}
