<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_userNotConnectedCantAccessUserInfo()
    {
        $response = $this->get(env('APP_URL','http://127.0.0.1:8000').'/api/user/info');

        $response->assertStatus(500);
    }

    public function test_userConnectedCanAccessUserInfos()
    {
        //make ne persiste pas dand bdd, create le persiste

        $user = User::make([
            'name' => 'Test',
            'firstname' => 'Test',
            'lastname' => 'Test',
            'gender' => 'male',
            'email' => "test@test.com",
            'email_verified_at' => now(),
            'password' => 'test',
            'address' => 'test',
            'birth_date' => '2000-01-01'
        ]);
        $response = $this->actingAs($user)->get(env('APP_URL','http://127.0.0.1:8000').'/api/user/info');

        $response->assertStatus(200);
    }
}
