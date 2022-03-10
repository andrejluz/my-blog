<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coding;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Laravelista\Comments\Comment;


class HomeController extends Controller
{
    public function index() {

        $posts_count = Post::all() -> count();
        $category_count= Category::all() ->count();
        $users_count = User::all() ->count();
        $codings_count = Coding::all()->count();
        $portfolios_count = Portfolio::all()->count();
        $comments_count = Comment::all()->count();
         return view('admin.home.index' , [
            'posts_count' => $posts_count,
            'category_count' => $category_count,
            'users_count' =>$users_count,
            'codings_count' => $codings_count,
             'portfolios_count' => $portfolios_count,
             'comments_count' => $comments_count,

        ]);
    }
}
