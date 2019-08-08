<?php

namespace Liberty\Http\Controllers;
use Liberty\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('productos.productos', ['products' => $products]);
  
    }

    protected function adminIndex(){

        $products = Product::orderBy('id', 'ASC')->paginate(3);
        return view('administrador.productos')->with('products', $products);
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
        $this->validate($request,[
            'nombre' => 'required',
            'imagen' => 'required',
            'descripcion' => 'required'
        ]);

        if($file = $request->hasFile('imagen')) {

            $file = $request->file('imagen') ;

            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/image/' ;
            $file->move($destinationPath,$fileName);

            $product = new Product();
            $product->nombre = $request->nombre;
            $product->precio = $request->precio;
            $product->nombreImagen = $fileName;
            $product->descripcion = $request->descripcion;
            $product->user_id = \Auth::user()->id;
            $product->save();
            $product->category_id = \Auth::category()->id;
            $product->save();

            $request->session()->flash('successStoreProduct', 'El producto se ha guardado satisfactoriamente');
            return redirect()->back();
        } else {
            $request->session()->flash('errorStoredProduct', 'No se ha podido guardar la instalacion');
            return redirect()->back();
        }

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
