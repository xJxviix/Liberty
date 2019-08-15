<?php

namespace Liberty\Http\Controllers;

use Illuminate\Http\Request;
use Liberty\Product;
use Liberty\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $product = Product::all();
        return view('bienvenida' ,compact('categories','product'));
    }
}
