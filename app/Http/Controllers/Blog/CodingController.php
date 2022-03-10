<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Coding;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use Laravelista\Comments\Comment;

class CodingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codings = Coding::orderBy('created_at', 'DESC') ->where('status', true)-> paginate(10);
        $posts = Post::orderBy('created_at', 'DESC') ->get();
        $comments = Comment::orderBy('created_at', 'DESC')->get();
        $random_posts = Post::inRandomOrder()->take(5)->get();
        $random_comments = Comment::inRandomOrder()->take(1)->get();
        return view('blog.coding.index', [
            'codings' => $codings,
            'posts' => $posts,
            'comments' => $comments,
            'random_posts' => $random_posts,
            'random_comments' => $random_comments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coding  $coding
     * @return \Illuminate\Http\Response
     */
    public function show(Coding $coding)
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $comments = Comment::orderBy('created_at', 'DESC')->get();
        $random_posts = Post::inRandomOrder()->take(5)->get();
        $random_comments = Comment::inRandomOrder()->take(1)->get();
        return view('blog.coding.show', [
            'coding' => $coding,
            'posts' => $posts,
            'comments' => $comments,
            'random_posts' => $random_posts,
            'random_comments' => $random_comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coding  $coding
     * @return \Illuminate\Http\Response
     */
    public function edit(Coding $coding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coding  $coding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coding $coding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coding  $coding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coding $coding)
    {
        //
    }


    public function likeCoding($coding)
    {
            $user = Auth::user();
            $likeCoding= $user->likedCodings()->where('coding_id', $coding)->count();
            if($likeCoding == 0) {
                $user->likedCodings()->attach($coding);

            } else {
                $user->likedCodings()->detach($coding);
            }
                return redirect()->back();

    }

    public function showCodingsByCategory(Category $category)
    {
        $codings = Coding::where('cat_id', $category['id'])->paginate(9);

        return view('blog.category.index-codings', [
            'codings' => $codings,
            'category' => $category,
        ]);
    }
}
