<?php

namespace Liberty\Http\Controllers;

use Illuminate\Http\Request;
use Liberty\Product;
use Liberty\Reservation;
use DB; 
use Illuminate\Support\Facades\Auth;

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
        //$reservationCount = Reservation::where('user_id', Auth::user()->id)->count();

        //Mostrar reservas relacionada con el ID del usuario
        //$reservationCount = DB::table('reservations')->where('user_id', $id)->get();

        return view('bienvenida', compact('products', 'tophamburguer'));
    }

    
}
