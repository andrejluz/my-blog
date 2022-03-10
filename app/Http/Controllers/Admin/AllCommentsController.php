<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravelista\Comments\Comment;

class AllCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'DESC')->get();
        return view('admin.comments.index', [
            'comments' => $comments,
            'comments_count' => $comments->count(),
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
     * @param  \aravelista\Comments\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment  $comment)
    {
        return view('admin.comments.edit', [
            'comment' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     *@param  \Illuminate\Http\Request  $request
     * @param  \aravelista\Comments\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment  $comment)
    {
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back()->with('message', 'Komentaras sekmingai atnaujintas !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param  \aravelista\Comments\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('message', 'Komentaras yra istrintas');    }
}
