<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sessions.index')->with('title', 'Sessions');                
    }


    /**
     * Sets the Session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function set(Request $request)
    {    
        $this->validate($request, [
            'session_id' => 'required',
        ]);

        session(['session_id' => $request->input('session_id')]);
        return redirect()->back()->with('success', 'Session Set Successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session =  new Session;

        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
        ]);

        $session->name = $request->input('name');
        $session->date = $request->input('date');
        $session->start_time = $request->input('start_time');
        $session->end_time = $request->input('end_time');
        $session->timetable_id = $request->input('timetable_id');
        $session->user_id = Auth::user()->id;

        if($session->save()){
            return redirect()->back()->with('success', 'Attendance Session in Successfully.');
        }else{
            return redirect()->back()->with('warning', 'Sorry, something went wrong.');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = Session::findOrFail($id);
        return view('sessions.edit')->with('session', $session);
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
        $session = Session::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
        ]);

        $session->name = $request->input('name');
        $session->date = $request->input('date');
        $session->start_time = $request->input('start_time');
        $session->end_time = $request->input('end_time');
        $session->timetable_id = $request->input('timetable_id');

        if($session->save()){
            return redirect()->back()->with('success', 'Attendance Session updated Successfully.');
        }else{
            return redirect()->back()->with('warning', 'Sorry, something went wrong.');
        }

    }

    /**
     * Show Confirm Delete Modal for the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $session = Session::findOrFail($id);
        return view('sessions.delete')->with('session', $session);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::destroy($id);

        if($session){
            return redirect()->back()->with('success', 'Attendance Session deleted Successfully.');
        }else{
            return redirect()->back()->with('warning', 'Sorry, something went wrong.');
        }

    }

}
