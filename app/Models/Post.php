<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'photo', 'created_at', 'views' , 'user_id'];
    public $timestamps = false;
    protected $dates = ['created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}