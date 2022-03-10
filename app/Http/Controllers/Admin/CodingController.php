<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coding;
use App\Models\Category;
use Illuminate\Http\Request;

class CodingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codings = Coding::orderBy('created_at', 'DESC')->get();
        return view ('admin.coding.index', [
            'codings' => $codings,
            'codings_count' => $codings->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.coding.create', [ 
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coding = new Coding();
        $coding->title = $request->title;
        $coding->img = '/'. $request->img;
        $coding->text = $request->text;
        $coding->cat_id = $request->cat_id;
        $coding->status = $request->status;
        $coding->save();

        return redirect()->back()->with('message', 'Naujas koding straipsnis sekmingai ikeltas !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coding  $coding
     * @return \Illuminate\Http\Response
     */
    public function show(Coding $coding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coding  $coding
     * @return \Illuminate\Http\Response
     */
    public function edit(Coding $coding)
    {
        $categories = Category::orderBy('created_at' , 'DESC') ->get();

        return view('admin.coding.edit', [ 
            'coding' => $coding,
            'categories' => $categories,
        ]);
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
        $coding->title = $request->title;
        $coding->img = '/'. $request->img;
        $coding->text = $request->text;
        $coding->cat_id = $request->cat_id;
        $coding->status = $request->status;
        $coding->save();

        return redirect()->back()->with('message', 'Koding straipsnis sekmingai atnaujintas !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coding  $coding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coding $coding)
    {
        $coding -> delete();

        return redirect()->back()->with('message', 'Koding straipsnis sekmingai Istrintas !!!'); 
    }
}
