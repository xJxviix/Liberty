<?php
namespace Liberty\Http\Controllers;
use Liberty\Reservation;
use Liberty\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Liberty\Http\Controllers\Controller;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$reservations = Reservation::all();  , ['reservations' => $reservations]

        $users = User::all();
        return view('reservas.reserva', compact('users'));
    }

    protected function adminIndex(){

        $reservation = Reservation::all();
        return view('administrador.reservas')->with('reservation', $reservation);
    }
    public function reserve(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'dateandtime' => 'required',
            'num' => 'required|integer|min:4|max:14'
        ]);
        
        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->date_and_time = $request->dateandtime;
        $reservation->num = $request->num;
        $reservation->message = $request->message;
        $reservation->status = false;
        $reservation->save();
        Toastr::success('Su solicitud de reserva ha sido enviada con éxito. Le confirmaremos con la menor brevedad','Success',["positionClass" => "toast-top-right"]);
           
        return redirect()->back();
    }

    public function status($id){
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
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
            'phone' => 'required',
            'email' => 'required|email',
            'dateandtime' => 'required',
            'num' => 'required|integer|min:4|max:14'
        ]);
        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->date_and_time = $request->dateandtime;
        $reservation->num = $request->num;
        $reservation->message = $request->message;
        $reservation->status = false;
        $reservation->save();
        Toastr::success('Su solicitud de reserva ha sido enviada con éxito. Le confirmaremos con la menor brevedad','Success',["positionClass" => "toast-top-right"]);
           
        return redirect()->back();
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back()->with('successMsg','Se ha eliminado la reserva correctamente');
    }
}