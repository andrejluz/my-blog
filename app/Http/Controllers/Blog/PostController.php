<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Laravelista\Comments;
use Illuminate\Support\Facades\Auth;
use Laravelista\Comments\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::orderBy('created_at', 'DESC')->where('status', true)->paginate(9);
        // $reactionType = ReactionType::fromName('Like');
        $comments = Comment::orderBy('created_at', 'DESC')->get();
        $random_posts = Post::inRandomOrder()->take(5)->get();
        $random_comments = Comment::inRandomOrder()->take(1)->get();
        return view('blog.post.index', [
            'posts' => $posts,
            'random_posts' => $random_posts,
            'random_comments' => $random_comments,
            'comments' => $comments,
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $posts = Post::orderBy('created_at', 'DESC')->where('status', true)->get();
        $comments = Comment::orderBy('created_at', 'DESC')->get();
        $random_posts = Post::inRandomOrder()->take(5)->get();
        $random_comments = Comment::inRandomOrder()->take(1)->get();
        return view('blog.post.show', [
            'post' => $post,
            'posts' => $posts,
            'comments' => $comments,
            'random_posts' => $random_posts,
            'random_comments' => $random_comments,
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }


    public function likePost($post)
    {
            $user = Auth::user();
            $likePost= $user->likedPosts()->where('post_id', $post)->count();
            if($likePost == 0) {
                $user->likedPosts()->attach($post);

            } else {
                $user->likedPosts()->detach($post);
            }
                return redirect()->back();

    }


   public function showPostsByCategory(Category $category)
    {
        $posts = Post::where('cat_id', $category['id'])->paginate(9);
        $random_posts = Post::inRandomOrder()->take(5)->get();
        $random_comments = Comment::inRandomOrder()->take(1)->get();

        return view('blog.category.index', [
            'posts' => $posts,
            'category' => $category,
            'random_posts'=> $random_posts,
            'random_comments' => $random_comments,
        ]);
    }
}
