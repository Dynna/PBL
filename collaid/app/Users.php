<?php

namespace App;

//use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    protected $fillable = ['first_name', 'last_name', 'email', 'password'];

/*    public function posts(){
        return $this->hasMany(Post::class);
    }*/
}
