<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use Auth;
use Session;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('configs.index')->with('title', 'Configurations');                
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
        $config =  new Config;

        $this->validate($request, [
            'key' => 'required',
            'value' => 'required',
        ]);

        $config->key = $request->input('key');
        $config->value = $request->input('value');

        if($config->save()){
            return redirect()->back()->with('success', 'Configuration added Successfully.');
        }else{
            return redirect()->back()->with('warning', 'Sorry, something went wrong.');
        }

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
        $config = Config::find($id);
        return view('configs.edit')->with('config', $config);
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
        $config = Config::find($id);

        $this->validate($request, [
            'key' => 'required',
            'value' => 'required',
        ]);

        $config->key = $request->input('key');
        $config->value = $request->input('value');

        if($config->save()){
            Session::flash('success', 'Configuration updated Successfully.');
            return redirect()->back();
        }else{
            Session::flash('status', 'Sorry, something went wrong.');
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
        $config = Config::find($id);
        return view('configs.delete')->with('config', $config);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $config = Config::destroy($id);

        if($config){
            return redirect()->back()->with('success', 'Configuration deleted Successfully.');
        }else{
            return redirect()->back()->with('warning', 'Sorry, something went wrong.');
        }

    }
}
