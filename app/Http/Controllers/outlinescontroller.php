<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\outlines;
use Validator;
use Response;
use App\Http\Requests\outlines\tambah;
use App\Http\Requests\outlines\editItem;
use Illuminate\Supprot\Facades\Input;
class outlinescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ide = outlines::all();
        return view('outlines.index',compact('ide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outlines.tambah');
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

        $ide = new  outlines;
        $ide->title = $request->title;
        $ide->body = $request->body;
        $ide->save();

        return redirect('outlines')-> with('message', 'outlines telah diupdate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = outlines::find($id);
         return view('outlines.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = outlines::find($id);
        return view('outlines.edit',compact('item'));
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

        $ide = outlines::find($id);
        $ide->title = $request->title;
        $ide->body = $request->body;
        $ide->save();

        return redirect('outlines')-> with('message', 'outlines telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =outlines::find($id);
        $item->delete();
        return redirect('/outlines');
    }

    public function editItem(Request $req) {
        $outlines = outlines::findOrfail($req->id);
        $outlines->title = $req->title;
        $outlines->body = $req->body;

        $outlines->save();
        return response ()->json ($outlines);
    }

    public function deleteItem(Request $req)
    {
        outlines::find($req->id)->delete();
        return response()->json();
    }
}
