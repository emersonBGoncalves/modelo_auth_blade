<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('123'),
        ]);
        
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => '123',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');;
    }

    public function test_login_with_invalid_credentials(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test2@example.com',
            'password' => Hash::make('123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'erro@example.com',
            'password' => '123',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['email']);
    }
}
