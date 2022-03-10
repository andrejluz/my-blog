<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;



    public function posts()
    {   
         return $this->hasMany('App\Models\Post','cat_id');
        }

        public function codings()
        {   
             return $this->hasMany('App\Models\Coding','cat_id');
            }
}


