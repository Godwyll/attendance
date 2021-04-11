<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use Auth;
use Helpers;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('entries.index')->with('title', 'Entries');                
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entries.create')->with('title', 'New Entry');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entry =  new Entry;

        $this->validate($request, [
            'student_no' => 'required',
        ]);

        $entry->session_id = session('session_id');
        $entry->student_no = $request->input('student_no');
        $entry->user_id =  Auth::user()->id;

        if (session('session_id')) {
            if(!Helpers::entryExist($entry->student_no, $entry->session_id)){
                
                if($entry->save()){
                    // Session::flash('success', 'Student Checked in Successfully.');
                    // return redirect()->back();
                    return view('entries.partial')->with('student_no', $entry->student_no);
                }else{
                    // Session::flash('warning', 'Sorry, something went wrong.');
                    // return redirect()->back();
                    return "<div class='alert alert-danger alert-custom alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><h4 class='alert-title'>Oops!</h4> <p>Something went wrong. Please contact administrator.</p></div>";
                }
            }else{
                return "<div class='alert alert-danger alert-custom alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><h4 class='alert-title'>Heads-up!</h4> <p> Student has been already recorded within the same Attendance Session.</p></div>";
            }
        } else {
            return "<div class='alert alert-danger alert-custom alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><h4 class='alert-title'>Heads-up!</h4> <p> Kindly set an Attendance Session before you can proceed.</p></div>";
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
        $entry = Entry::find($id);
        return view('entries.delete')->with('entry', $entry);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entry = Entry::destroy($id);

        if($entry){
            Session::flash('success', 'Entryuration deleted Successfully.');
            return redirect()->back();
        }else{
            Session::flash('warning', 'Sorry, something went wrong.');
            return redirect()->back();
        }

    }


}
