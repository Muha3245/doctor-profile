<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//imported
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auth extends Authenticatable
{
    use HasFactory;

    protected $guard = 'auths';

    protected $fillable = [
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
