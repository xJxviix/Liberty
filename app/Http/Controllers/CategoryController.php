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

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categorias', ['categories' => $categories]);
  
    }

    protected function adminIndex(){

        $categories = Category::orderBy('id', 'ASC')->paginate(3);
        return view('administrador.categorias')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $categories = new Category();
        $categories->name = $request->name;

        $categories->save();;
        return redirect()->back();
   
    }

    public function edit($id)
    {
        $categories=Category::find($id);  
        return view('administrador.editCategory', ['categories' => $categories]);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
        ]);

        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();

        $request->session()->flash('success', 'La categoria se ha actualizado correctamente');
        return back();
    }

    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return back();
    }

}
