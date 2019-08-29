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
            }else {
                return redirect('/');
            }
        }else {
            return redirect('/');
        }
    }
    
}
