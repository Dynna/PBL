<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $fillable = ['first_name', 'last_name', 'email', 'password',];

/*    public function posts(){
        return $this->hasMany(Post::class);
    }*/

    protected $hidden = ['password', 'remember_token', ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}
