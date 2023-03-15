<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class GoToMyPageTest extends TestCase
{
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertSeeText('Username');
        $response->assertSeeText('Password');
        $response->assertStatus(200);
    }
}
