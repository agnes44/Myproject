<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $events = event::all();
        // return view('event.list',compact('events'));
        return view('event/list', ['events' => Event::orderBy('start')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event/create_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $data = new Event();
        // $data->title =$request ->title;
        // $data->start =$request ->date_start . ' ' . $request->time_start;
        // $data->end =$request ->date_end;
        // $data->color =$request ->color;

        //  $data->save();
        // return redirect('/schedule');

        $time = explode(" - ", $request->input('time'));
  
         $event = new Event();
         $event->title = $request->input('title');
         $event->start =$request ->start;
         $event->end =$request ->end;
         $event->color = $request->color;
         $event->save();
          
         $request->session()->flash('success', 'The event was successfully saved!');
         return redirect('/event');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('event/show', ['event' => Event::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('event/edit', ['event' => Event::findOrFail($id)]);
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
  
         $event = Event::find($id);
         $event->title = $request->input('title');
         $event->start =$request ->start;
         $event->end =$request ->end;
         $event->color = $request->color;
         $event->save();
          
         $request->session()->flash('success', 'The event was successfully saved!');
         return redirect('/event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
          
        return redirect('events');
    }

    public function deleteItem(Request $req)
    {
        Event::find($req->id)->delete();
        return response()->json();
    }

    public function coba()
    {
        return view('event/coba');
    }
}
