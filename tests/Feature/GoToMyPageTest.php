<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class GoToMyPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_content_on_my_page()
    {
        $user = new User();
        $user->username = 'Billy';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->get('/myPage', [
            'username' => 'Billy',
            'password' => '123',
        ]);

        $response->assertRedirect('/');
        $response->assertStatus(302);
    }
}
