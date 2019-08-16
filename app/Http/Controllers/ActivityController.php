<?php

namespace Liberty\Http\Controllers;
use Liberty\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        $events = [];
        foreach ($activities as $activity){
            $event = \Calendar::event(
                $activity->nombre, //event title
                false, //full day event?
                ($activity->fecha . 'T' . $activity->hora_inicio), //start time (you can also use Carbon instead of DateTime)
                ($activity->fecha . 'T' . $activity->hora_fin), //end time (you can also use Carbon instead of DateTime)
                0, //optionally, you can specify an event ID
                [
                    'url' => route('reserva_actividad',  $activity->id),
                    'color' => '#DF013A'
                ]
            );
            array_push($events, $event);
        }

        //"Missing required parameters for [Route: reserva_actividad] [URI: actividades/reserva/{id}]."

        $calendar = \Calendar::addEvents($events)->setOptions([ //set fullcalendar options
            'firstDay' => 1,
            'locale' => 'es'
        ]); //add an array with addEvents


        return view('actividades.index', compact('calendar'));
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

    public function listarActividadesAdmin() 
    {
        $activities = Activity::all();
        return view('administrador.actividades', ['activities'=> $activities]);
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
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
        ]);

        $activity = new Activity();
        $activity->nombre = $request->nombre;
        $activity->descripcion = $request->descripcion;
        $activity->fecha = $request->fecha;
        $activity->hora_inicio = $request->hora_inicio;
        $activity->hora_fin = $request->hora_fin;
        $activity->user_id = auth()->user()->id;

        $activity->save();

        $request->session()->flash('activitySucces', 'La actividad se ha creado correctamente.');

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
        $activity = Activity::find($id);

        if ($activity != null) {
            return view('administrador/editActivity', ['activity'=> $activity]);
        }else {
            return redirect()->back();
        }
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
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
        ]);

        $activity->nombre = $request->nombre;
        $activity->descripcion = $request->descripcion;
        $activity->fecha = $request->fecha;
        $activity->hora_inicio = $request->hora_inicio;
        $activity->hora_fin = $request->hora_fin;

        $activity->save();

        $request->session()->flash('successUpdate', 'La actividad se ha actualizado correctamente');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);
        if ($activity != null) {
            $activity->destroy($id);
            return view('administrador.index');
        }else {
          
        return view('administrador.index');
        }

        
    }
}
