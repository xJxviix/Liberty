<?php

namespace Liberty\Http\Controllers;

use Illuminate\Http\Request;
use Liberty\Activity;
use Liberty\User;
use Liberty\Inscription;


class InscriptionController extends Controller
{

    public function reserva($id) {

        $activity = Activity::find($id);
        if ($activity == null) {
            return redirect('/');
        }else {
            return view('actividades.register')->with('activity', $activity);
        }

    }

    public function inscriptionToActivity($id,Request $request) {
        if ($id != null && $request->email) {
            $actividad = Activity::find($id);
            if ($actividad != null) {
                $usuario = User::all()->filter(function($user) use ($request) {
                    return $request->email == $user->email;
                })->first();

                // es socio TODO: se le ha de aplicar la tarifa de socio
                if ($usuario != null) {
                    $inscription = new Inscription();
                    $inscription->email = $request->email;
                    $inscription->activity_id = $id;
                    $inscription->save();

                    $request->session()->flash('success', 'Te has inscrito correctamente');
                    return back();
                }
                // es visitante TODO: se le ha de aplicar la tarifa de visitante
                else {
                    $inscription = new Inscription();
                    $inscription->email = $request->email;
                    $inscription->activity_id = $id;
                    $inscription->save();

                    $request->session()->flash('success', 'Te has inscrito correctamente');
                    return back();
                }
            }else {
                return redirect('/');
            }
        }else {
            return redirect('/');
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
