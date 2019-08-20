<?php

namespace Liberty\Http\Controllers;

use Illuminate\Http\Request;
use Liberty\Product;
use DB; 

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->where('category_id', '1')->get();
        $tophamburguer = DB::table('products')->where('nombre', 'Completa')->get();
        return view('bienvenida', compact('products', 'tophamburguer'));
    }

    
}
