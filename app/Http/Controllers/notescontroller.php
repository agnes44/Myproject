<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ note;
use Validator;
use Response;
use Auth;
use App\Http\Requests\note\editItem;
use App\Http\Requests\note\deleteItem;
use Illuminate\Supprot\Facades\Input;

class notescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $catatan = note::where('user_id',$user)->get();
        return view('note.page', compact('catatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('note/addItem');
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
        
        Auth::user()->note()->save($catatan);

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

     public function editItem(Request $req) {
        $catatan = note::findOrfail($req->id);
        $catatan->title = $req->title;
        $catatan->body = $req->body;

        $catatan->save();
        return response ()->json ($catatan);
    }

    public function deleteItem(Request $req)
    {
        note::find($req->id)->delete();
        return response()->json();
    }
}
