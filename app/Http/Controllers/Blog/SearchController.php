<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Laravelista\Comments\Comment;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            // Get the search value from the request
            $search = $request->input('search');

            // Search in the title and body columns from the posts table
            $posts = Post::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('text', 'LIKE', "%{$search}%")
                ->paginate(10);

        $comments = Comment::orderBy('created_at', 'DESC')->get();
        $random_posts = Post::inRandomOrder()->take(5)->get();
        $random_comments = Comment::inRandomOrder()->take(1)->get();
        // Return the search view with the resluts compacted
            return view('blog.search.index', [
                'posts' => $posts,
                'search_input' => $search,
                'commnets' => $comments,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
