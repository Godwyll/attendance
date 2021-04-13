<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
use Session;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('timetables.index')->with('title', 'Timetables');                
    }


    /**
     * Sets the Timetable.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function set(Request $request)
    {    
        $this->validate($request, [
            'timetable_id' => 'required',
        ]);

        session(['session_id' => $request->input('timetable_id')]);
        return redirect()->back()->with('success', 'Timetable Set Successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timetable =  new Timetable;

        $this->validate($request, [
            'course_code' => 'required',
            'course_name' => 'required',
            'date' => 'required',
        ]);

        $timetable->course_code = $request->input('course_code');
        $timetable->course_name = $request->input('course_name');
        $timetable->class = $request->input('class');
        $timetable->total_students = $request->input('total_students');
        $timetable->room = $request->input('room');
        $timetable->date = $request->input('date');
        $timetable->start_time = $request->input('start_time');
        $timetable->end_time = $request->input('end_time');

        if($timetable->save()){
            return redirect()->back()->with('success', 'Timetable Entry in Successfully.');
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
        $timetable = Timetable::findOrFail($id);
        return view('timetables.edit')->with('timetable', $timetable);
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
        $timetable = Timetable::findOrFail($id);

        $this->validate($request, [
            'course_code' => 'required',
            'course_name' => 'required',
            'date' => 'required',
        ]);

        $timetable->course_code = $request->input('course_code');
        $timetable->course_name = $request->input('course_name');
        $timetable->class = $request->input('class');
        $timetable->total_students = $request->input('total_students');
        $timetable->room = $request->input('room');
        $timetable->date = $request->input('date');
        $timetable->start_time = $request->input('start_time');
        $timetable->end_time = $request->input('end_time');

        if($timetable->save()){
            return redirect()->back()->with('success', 'Timetable Entry updated Successfully.');
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
        $timetable = Timetable::findOrFail($id);
        return view('timetables.delete')->with('timetable', $timetable);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timetable = Timetable::destroy($id);

        if($timetable){
            Session::flash('success', 'Timetable Entry deleted Successfully.');
            return redirect()->back();
        }else{
            Session::flash('warning', 'Sorry, something went wrong.');
            return redirect()->back();
        }

    }

}
