<?php

namespace Tests\Feature;

use App\Models\manager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testRegisterSucces()
    {
        $response = $this->json('post', '/api/v1/auth/register', [
            'name' => 'Bank Sampah Budi Luhur',
            'username' => 'bank budi',
            'address' => 'Jl. Kompol Selatan Raya',
            'email' => 'bankluhur@gmail.com',
            'password' => 'pwas2135'
        ]);

        $response->assertStatus(201)->assertJsonFragment([
            'data' => [
                'type' => 'App\Models\manager',
                'attributes' => [
                    'id' => 1,
                    'name' => 'Bank Sampah Budi Luhur',
                    'username' => 'bank budi',
                    'address' => 'Jl. Kompol Selatan Raya',
                    'email' => 'bankluhur@gmail.com',
                    'password' => 'pwas2135'
                ]
            ]
        ]);
    }

    public function testRegisterFailed() 
    {
        $response = $this->json('post', '/api/v1/auth/register', [
            'name' => 'Bank Sampah Budi Luhur',
            'username' => 'bank budi',
            'address' => 'Jl. Kompol Selatan Raya',
            'email' => 'bankluhur@gmail.com'
        ]);

        $response->assertStatus(422)->assertJsonFragment([
            'errors' => [
                'status' => 422,
                'message' => [
                    'password' => [
                        'The password field is required.'
                    ]
                ]
            ]
        ]);
    }
}
