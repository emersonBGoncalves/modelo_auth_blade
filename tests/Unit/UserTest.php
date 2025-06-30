<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_user_creation(): void
    {
        $user = new User();
        $user->name = 'Test User';
        $user->email = 'teste@teste.com';
        $user->password = Hash::make('123');
        $user->save();
        
        $this->assertDatabaseHas('users', [
            'email' => 'teste@teste.com'
        ]);
    }
}
