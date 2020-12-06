<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'post_title',
        'post_content'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
