<?php

namespace Liberty\Http\Controllers;
use Liberty\Product;
use Liberty\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::all();
        $categories = Category::all();
        return view('productos.productos',compact('categories', 'product'));
  
    }

    protected function adminIndex()
    {
        $products = Product::all();
        return view('administrador.productos')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('productos.create',compact('categories'));
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
            'descripcion' => 'required',
            'precio' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);

        $product = Product::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/productos'))
            {
                mkdir('uploads/productos',0777,true);
            }
            unlink('uploads/productos/'.$item->image);
            $image->move('uploads/productos',$imagename);
        }else{
            $imagename = $item->image;
        }

        $products->category_id = $request->category_id;
        $products->nombre = $request->nombre;
        $products->descripcion = $request->descripcion;
        $products->precio = $request->precio;
        $products->image = $imagename;
        $products->save();
        Toastr::success('El producto se ha añadido correctamente','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();

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
        $products=Product::find($id);
        $categories = Category::all();
        return view('productos.edit',compact('products','categories'));
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
        $this->validate($request,[
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'category_id' => 'required',
           // 'image' => 'mimes:jpeg,jpg,bmp,png'
        ]);

        $product = Product::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $auximage = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/productos'))
            {
                mkdir('uploads/productos',0777,true);
            }
            unlink('uploads/productos/'.$product->image);
            $image->move('uploads/productos',$auximage);
        }else{
            $auximage = $product->image;
        }

        $product->category_id = $request->category_id;
        $product->nombre = $request->nombre;
        $product->descripcion = $request->descripcion;
        $product->precio = $request->precio;
        $product->image = $auximage;
        $product->save();
        Toastr::success('Se ha actualizado el producto correctamente','Success',["positionClass" => "toast-top-right"]);
        return redirect()->route('mostrarProducto')->with('successMsg','Item Successfully Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (file_exists('uploads/item/'.$product->image))
        {
            unlink('uploads/item/'.$product->image);
        }
        $product->delete();
        Toastr::success('El Producto se ha eliminado correctamente','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }
}
