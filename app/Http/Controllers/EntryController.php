<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use Auth;
use Session;

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

        if($entry->save()){
            Session::flash('success', 'Student Checked in Successfully.');
            return redirect()->back();
        }else{
            Session::flash('warning', 'Sorry, something went wrong.');
            return redirect()->back();
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
