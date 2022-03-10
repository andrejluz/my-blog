<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use PawelMysior\Publishable\Publishable;
use Laravelista\Comments\Commentable;


class Post extends Model
{
    use  HasFactory, Publishable, Commentable;

    protected $fillable = ['title'];

    public function category()
    {

        return $this->belongsTo('App\Models\Category', 'cat_id');
    }


        public function likedUsers()
        {
            return $this->belongsToMany('App\Models\User', 'post_user_like', 'post_id', 'user_id');
        }


}
