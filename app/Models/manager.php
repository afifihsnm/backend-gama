<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class manager extends Authenticatable implements JWTSubject, AuthAuthenticatable, Authorizable
{
    use HasFactory;

    protected $table = 'managers';

    public $fillable = [
        'name', 'username', 'address', 'email', 'password'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();   
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
