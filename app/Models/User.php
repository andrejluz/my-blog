<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravelista\Comments\Commenter;
use App\Models\Post;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userReact() {

        return $user->registerAsLoveReacter();
    }



    public function likedPosts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_user_like', 'user_id', 'post_id');
    }


    public function likedCodings()
    {
        return $this->belongsToMany('App\Models\Coding', 'coding_user_like', 'user_id', 'coding_id');
    }


    public function is_admin()
    {
        return $this->belongsToMany('App\Models\User', 'roles', 'name');
    }


}
