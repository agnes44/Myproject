<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $adminevent = Event::all();
        // return view('admin.adminevent.list')->with('adminevent', $adminevent);
        return view('admin/adminevent/list', ['adminevent' => Event::orderBy('start')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminevent.create_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
         $time = explode(" - ", $request->input('time'));
         
         // $adminevent=$request->all();
         // dd($adminevent);
         $adminevent = new Event();
         $adminevent->title = $request->input('title');
         $adminevent->start =$request ->start;
         $adminevent->end =$request ->end;
         $adminevent->color = $request->color;
         $adminevent->save();
          
         $request->session()->flash('success', 'The event was successfully saved!');
         return redirect('/adminevent');
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
         $adminevent = Event::find($id);
         return view('admin/adminevent.edit',compact('adminevent'));
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
         $time = explode(" - ", $request->input('time'));
         
         // $adminevent=$request->all();
         // dd($adminevent);
         $adminevent = Event::find($id);
         $adminevent->title = $request->title;
         $adminevent->start =$request ->start;
         $adminevent->end =$request ->end;
         $adminevent->color = $request->color;
         $adminevent->save();
          
         $request->session()->flash('success', 'The event was successfully edit!');
         return redirect('/adminevent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(Request $req)
    {
        Event::find($req->id)->delete();
        return response()->json();
    }
}
