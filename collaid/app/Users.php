<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'date_of_birth', 'provided_service',
        'past_experience'];

/*    public function posts(){
        return $this->hasMany(Post::class);
    }*/

    protected $hidden = ['password '];

//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];


}
