<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Category;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('created_at', 'DESC')->get();
        return view('admin.portfolio.index', [
            'portfolios' => $portfolios,
            'portfolios_count' => $portfolios->count(),
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

        return view('admin.portfolio.create', [ 
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
        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->img = '/'. $request->img;
        $portfolio->text = $request->text;
        $portfolio->cat_id = $request->cat_id;
        $portfolio->status = $request->status;
        $portfolio->save();

        return redirect()->back()->with('message', 'Naujas portfolio įrašas sekmingai ikeltas !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        $categories = Category::orderBy('created_at' , 'DESC') ->get();

        return view('admin.portfolio.edit', [ 
            'portfolio' => $portfolio,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $portfolio->title = $request->title;
        $portfolio->img = '/'. $request->img;
        $portfolio->text = $request->text;
        $portfolio->cat_id = $request->cat_id;
        $portfolio->status = $request->status;
        $portfolio->save();

        return redirect()->back()->with('message', 'Portfolio įrašas sekmingai atnaujintas !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio -> delete();

        return redirect()->back()->with('message', 'Portfolio įrašas sekmingai Ištrintas !!!'); 
    }
}
