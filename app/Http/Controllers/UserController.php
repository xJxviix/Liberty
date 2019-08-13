<?php

use Illuminate\Http\Request;
namespace Liberty\Http\Controllers;
use Liberty\User;
use Laracasts\Flash\FlashServiceProvider;
use Liberty\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function administrar() {
        return view('administrador.index');
    }

    public function dashboard() {
        return view('administrador.dashboard');
    }

    protected function adminIndex(){

        $users = User::all();
        return view('administrador.usuarios')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
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
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required','string', 'email', 'max:255', 'unique:users',
            'password' => 'required|min:8|nullable',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request['password']);
        if(empty($data['photo'])){
            $img_route = "seeds/default.png";
        }

        $user->photo = $img_route;
        $user->save();
        return redirect()->back()->with('successMsg','Se ha creado el usuario correctamente');
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
        return view('usuarios.edit')->with('user',$user);
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
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;

        if ($request->tipo != null) {
            $user->tipo = $request->tipo;
        }

        $user->save();
        return redirect()->back()->with('successMsg','Se ha actualizado el usuario correctamente');
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
        return redirect()->back()->with('successMsg','El usuario se ha eliminado correctamente');
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
        return back();
    }


}
