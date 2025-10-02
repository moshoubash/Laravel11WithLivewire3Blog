<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];
    public $timestamps = false;
    protected $dates = ['created_at'];
}
