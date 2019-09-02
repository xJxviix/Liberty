<?php

namespace Liberty\Http\Controllers;
use Liberty\Activity;
use Liberty\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

use Carbon\Carbon;

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
        return view('actividades.actividades', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actividades.create');
    }

    public function adminIndex() 
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
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $auximage= $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/activities'))
            {
                mkdir('uploads/activities',0777,true);
            }
            $image->move('uploads/activities',$auximage);
        }else{
            $auximage = "default.png";
        }

        $activity = new Activity();
        $activity->nombre = $request->nombre;
        $activity->descripcion = $request->descripcion;
        $activity->fecha = $request->fecha;
        $activity->hora_inicio = $request->hora_inicio;
        $activity->hora_fin = $request->hora_fin;
        $activity->user_id = auth()->user()->id;
        $activity->image = $auximage;

        $activity->save();
        Toastr::success('La actividad se ha añadido correctamente','Success',["positionClass" => "toast-top-right"]);
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
            return view('actividades/edit', ['activity'=> $activity]);
        }else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required|date',
        ]);

        $activity = Activity::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $auximage = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/activities'))
            {
                mkdir('uploads/activities',0777,true);
            }
            unlink('uploads/activities/'.$activity->image);
            $image->move('uploads/activities',$auximage);
        }else{
            $auximage = $activity->image;
        }

        $activity->nombre = $request->nombre;
        $activity->descripcion = $request->descripcion;
        $activity->fecha = $request->fecha;
        $activity->hora_inicio = $request->hora_inicio;
        $activity->hora_fin = $request->hora_fin;
        $activity->image = $auximage;
        $activity->save();
        Toastr::success('La actividad se ha actualizado correctamente','Success',["positionClass" => "toast-top-right"]);
        return redirect()->route('listarActividadesAdmin')->with('successMsg','Activity Successfully Updated');

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
            $activity->delete();
            Toastr::success('El Producto se ha eliminado correctamente','Success',["positionClass" => "toast-top-right"]);
            return redirect()->back();
    
        }else {
             return redirect()->back();
        }
    }


    public function inscription(Request $request)
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
}
