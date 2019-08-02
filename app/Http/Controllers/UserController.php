<?php

namespace Liberty\Http\Controllers;
use Liberty\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Liberty\User;
use Validator;
use Liberty\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use Storage;
use Laracasts\Flash\FlashServiceProvider;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(10);
        return view('administrador.usuarios')->with('users', $users);
    }

    public function administrar() {
        return view('administrador.index');
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
    public function show()
    {
        $user = User::find(auth()->user()->id);
        return view('auth.user_profile')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('administrador.editUsers')->with('user',$user);
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
            'lastname' => 'required',
            'email' => 'required'
        ]);

        $user = User::find($id);
        $user->nombre = $request->nombre;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        if ($request->tipo != null) {
            $user->tipo = $request->tipo;
        }

        $user->save();
        $request->session()->flash('success', 'El usuario se ha actualizado correctamente');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    //--------------------------------------------
    
    /*
    Actualizar Perfil Usuario - Registrado
    */
    public function editUser($id)
    {
        $users=User::find($id);  
        return view('perfilUsuario', ['users' => $users]);
    }

    public function updateUser(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'lastname' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->lastname = $request->input('lastname');
        $user->save();

        $request->session()->flash('success', 'El usuario se ha actualizado correctamente');
        return back();
    }


}
