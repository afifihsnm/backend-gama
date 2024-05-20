<?php

namespace Tests\Feature;

use Database\Seeders\ManagerSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokenJWTTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateTokenJwt()
    {
        $this->seed([ManagerSeeder::class]);
        $token = Auth::attempt(['username' => 'bank budi', 'password' => 'budiluhur123']);
        $this->assertNotNull($token);
    }
}
