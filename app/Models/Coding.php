<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;
use App\Models\Category;
use App\Models\User;

class Coding extends Model
{
    use HasFactory, Commentable;


    public function category()
    {    
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }


    public function likedUsers()
    {
        return $this->belongsToMany('App\Models\User', 'coding_user_like', 'coding_id', 'user_id');
    }
}
