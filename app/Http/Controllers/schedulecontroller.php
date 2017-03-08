<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\schedule;
use Validator;
use Response;
use App\Http\Requests\schedule\add;
use App\Http\Requests\schedule\ubah;
use Illuminate\Supprot\Facades\Input;

class schedulecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = schedule::all();
        return view('schedule.page', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $jadwal = new schedule;
       $this->validate($request,[
                'title'=>'required',
                'start'=>'required',
                'ends'=>'required',
                'note'=>'required',
            ]);
        
        $jadwal->title = $request->title;
        $jadwal->start = $request->start;
        $jadwal->ends = $request->ends;
        $jadwal->note = $request->note;

        $jadwal->save();
        
        return redirect ('schedule')->with('message', 'note telah diupdate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = schedule::where('id', $id)->first();
        return view('schedule.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = schedule::find($id);
        return view('schedule.edit',compact('item'));
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
       
       $this->validate($request,[
                'title'=>'required',
                'start'=>'required',
                'ends'=>'required',
                'note'=>'required',
            ]);
        
        $jadwal = schedule::find($id);

        $jadwal->title = $request->title;
        $jadwal->start = $request->start;
        $jadwal->ends = $request->ends;
        $jadwal->note = $request->note;

        $jadwal->save();
        
        return redirect ('schedule')->with('message', 'note telah diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item =schedule::find($id);
         $item->delete();
         return redirect('/schedule');
    }

    public function ubah(Request $req) 
    {
        $jadwal = schedule::findOrfail($req->id);
        $jadwal->title = $req->title;
        $jadwal->start = $req->start;
        $jadwal->ends = $req->ends;
        $jadwal->note = $req->note;

        $jadwal->save();
        return response ()->json ($jadwal);
    }

    public function deleteItem(Request $req)
    {
        schedule::find($req->id)->delete();
        return response()->json();
    }
}
