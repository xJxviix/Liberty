<?php

namespace Liberty\Http\Controllers;
use Illuminate\Http\Request;
use Liberty\User;
use Liberty\Category;
use Liberty\Product;
use Liberty\Reservation;
use Liberty\Activity;
use Laracasts\Flash\FlashServiceProvider;
use Liberty\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::where('status',false)->get();
        return view('auth.dashboard',compact('reservations'));
    }

    public function dashboard() {

        $categoryCount = Category::count();
        $itemCount = Product::count();
        $activitiesCount = Activity::count();
        $reservations = Reservation::where('status',false)->get();
        return view('administrador.dashboard',compact('categoryCount','itemCount','reservations','activitiesCount'));
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

        Toastr::success('Se ha creado el usuario correctamente','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
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

        Toastr::success('Se ha actualizado el usuario correctamente','Success',["positionClass" => "toast-top-right"]);
        return redirect()->route('mostrarUsuario')->with('successMsg','Item Successfully Updated');
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
        Toastr::success('El usuario se ha eliminado correctamente','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }

    //--------------------------------------------
    
    /*
    Actualizar Perfil Usuario - Registrado
    */
    public function editUser($id)
    {
        $users=User::find($id);  

        //Mostrar reservas relacionada con el ID del usuario
        $reservations = DB::table('reservations')->where('user_id', $id)->get();

        return view('perfilUsuario', compact('users', 'reservations'));

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
        Toastr::success('El usuario se ha actualizado correctamente','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    /*
    Mostrar Reservas del usuario
    */
    public function userReservation($id)
    {
        //$users=User::find($id);  
        //Mostrar reservas relacionada con el ID del usuario
        $reservations = DB::table('reservations')->where('user_id', $id)->get();
        $activities = DB::table('activities')->where('user_id', $id)->get();
        return view('usuarios.userProfile.user_reservation', compact('reservations', 'activities'));

    }

    


}
