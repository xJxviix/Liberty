<?php
namespace Liberty\Http\Controllers;
use Illuminate\Http\Request;
use Liberty\Http\Requests;
use Mail;
use Session;
class ContactMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contactanos');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'min:3',
            'email' => 'required|email',
            'message' => 'min:10'
        ]);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'bodyMessage' => $request->message
        );
        Mail::send('email.contactmail', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('jxvi21@gmail.com');
            $message->subject($data['name']);
        });
        Session::flash('success', 'Tu correo se ha enviado correctamente');
        return redirect('/');
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
