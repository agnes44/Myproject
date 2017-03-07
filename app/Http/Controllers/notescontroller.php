<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\note;
class notescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catatan =note::all();
        return view('note.index', compact('catatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);        

        $catatan = new  note;
        $catatan->title = $request->title;
        $catatan->body = $request->body;
        $catatan->save();

        return redirect('note')-> with('message', 'note telah diupdate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $item = note::find($id);
         return view('note.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = note::find($id);
        return view('note.edit',compact('item'));
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
        $this ->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);        

        $catatan = note::find($id);
        $catatan->title = $request->title;
        $catatan->body = $request->body;
        $catatan->save();

        return redirect('note')-> with('message', 'note telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item =note::find($id);
         $item->delete();
         return redirect('/note');
    }
}
