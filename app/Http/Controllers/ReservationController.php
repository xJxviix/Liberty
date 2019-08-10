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

    public function reserve(Request $request)
    {
            $this->validate($request,[
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'dateandtime' => 'required'
            ]);
            $reservation = new Reservation();
            $reservation->name = $request->name;
            $reservation->phone = $request->phone;
            $reservation->email = $request->email;
            $reservation->date_and_time = $request->dateandtime;
            $reservation->message = $request->message;
            $reservation->status = false;
            $reservation->save();
            Toastr::success('Reservation request sent successfully. we will confirm to you shortly','Success',["positionClass" => "toast-top-right"]);
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
            'dateandtime' => 'required'
        ]);
        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->date_and_time = $request->dateandtime;
        $reservation->message = $request->message;
        $reservation->status = false;
        $reservation->save();
         Toastr::success('Su solicitud de reserva ha sido enviada con éxito. Le confirmaremos con la menor brevedad','Success',["positionClass" => "toast-top-right"]);
           
        return redirect()->back();
    }


}
