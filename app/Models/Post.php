<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post_title',
        'user_id',
        'post_image',
        'post_content',
        'post_date'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
