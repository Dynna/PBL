<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'date_of_birth', 'provided_service',
        'past_experience', 'avatar'];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    public function isAdmin()
    {
        return $this->type === self::ADMIN_TYPE;
    }
}
