<?php

namespace Liberty\Http\Controllers;
use Liberty\Category;
use Illuminate\Http\Request;
use Liberty\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use Storage;
use Laracasts\Flash\FlashServiceProvider;
use Intervention\Image\ImageManagerStatic as Image;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categorias', ['categories' => $categories]);
  
    }

    protected function adminIndex(){

        $categories = Category::all();
        return view('administrador.categorias')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $categories = new Category();
        $categories->name = $request->name;
        $categories->slug = str_slug($request->name);
        $categories->save();;
        return redirect()->back()->with('successMsg','Se ha creado la categoria correctamente');
   
    }

    public function edit($id)
    {
        $categories=Category::find($id);  
        return view('categorias.edit', ['categories' => $categories]);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
        ]);

        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();
        Toastr::success('Se ha actualizado la categoría correctamente','Success',["positionClass" => "toast-top-right"]);
        return redirect()->route('mostrarCategoria')->with('successMsg','Item Successfully Updated');
    }

    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->back()->with('successMsg','Se ha eliminado la categoria correctamente');
    }

}
