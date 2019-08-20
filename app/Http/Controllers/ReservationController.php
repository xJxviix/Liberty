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
        //$reservation = Reservation::all();  , ['reservations' => $reservations]
        $users = User::all();
        return view('reservas.reserva', compact('users'));
    }

    protected function adminIndex(){

        $reservation = Reservation::all();
        return view('administrador.reservas')->with('reservation', $reservation);
    }

    /**
     * Solicitar Reserva USUARIO REGISTRADO
     */
    public function userReservation(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'dateandtime' => 'required',
            'num' => 'required|integer|min:4|max:14',
            'message' => 'required',
        ]);
        
        $reservation = new Reservation();
        $reservation->user_id =\Auth::user()->id;
        $reservation->name = \Auth::user()->name;
        $reservation->phone = $request->phone;
        $reservation->email = \Auth::user()->email;
        $reservation->date_and_time = $request->dateandtime;
        $reservation->num = $request->num;
        $reservation->message = $request->message;
        $reservation->status = false;
        $reservation->save();
        //$request->session()->flash('activitySucces', 'Su solicitud de reserva ha sido enviada con éxito. Le confirmaremos con la menor brevedad');
       
        Toastr::success('Su solicitud de reserva ha sido enviada con éxito. Le confirmaremos con la menor brevedad posible. Gracias','Success',["positionClass" => "toast-top-right"]);
        
        return redirect()->back();
    }

    public function status($id){
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        Toastr::success('Se ha realizado la confirmación de la reserva','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    /**
     * CREAR RESERVA USUARIO SIN REGISTRAR.
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
        $request->request->add(['user_id', '1']);
        $reservation->save();
        Toastr::success('Su solicitud de reserva ha sido enviada con éxito. Le confirmaremos con la menor brevedad','Success',["positionClass" => "toast-top-right"]);
        //$request->session()->flash('activitySucces', 'Su solicitud de reserva ha sido enviada con éxito. Le confirmaremos con la menor brevedad');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        Toastr::success('Se ha eliminado la reserva correctamente','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}