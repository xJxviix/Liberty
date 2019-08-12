<?php

namespace Liberty\Http\Controllers;
use Liberty\Reservation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Liberty\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use Storage;
use Laracasts\Flash\FlashServiceProvider;
use Intervention\Image\ImageManagerStatic as Image;

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
        return view('reservas.reserva');

    }

    protected function adminIndex(){

        $reservation = Reservation::orderBy('id', 'ASC')->paginate(5);
        return view('administrador.reservas')->with('reservation', $reservation);
    }

    public function reserve(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'dateandtime' => 'required',
            'num' => 'required|integer|between:4,15'
        ]);

        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->date_and_time = $request->dateandtime;
        $reservation->num = $request->num;
        $reservation->message = $request->message;
        $reservation->status = false;
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
            'num' => 'required|integer|between:4,15'
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
         Toastr::success('Su solicitud de reserva ha sido enviada con éxito. 
         Le confirmaremos con la menor brevedad.','Success',["positionClass" => "toast-top-right"]);
           
        return redirect()->back();
    }


    public function destroy($id)
    {
        Reservation::find($id)->delete();
        Toastr::success('Reservation successfully deleted.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


}
