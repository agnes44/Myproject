<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\note;
class AdminNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminnote = note::all();
        return view('admin.adminnote.page')->with('adminnote', $adminnote);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.adminnote.addItem');
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
        // $adminnote=$request->all();
        // dd($adminnote);
        $adminnote = new note;
        $adminnote->title = $request->title;
        $adminnote->body = $request->body;

        $adminnote->save();

        return redirect('adminnote')-> with('message', 'note telah ditambahkan');
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
         $adminnote = note::find($id);
         return view('admin/adminnote.edit',compact('adminnote'));
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
            'body' => 'required'
        ]);
        $adminnote = note::find($id);
        $adminnote->body = $request->body;
        
        $adminnote->save();

        return redirect('adminnote')-> with('message', 'note telah diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function deleteItem(Request $req)
    {
        note::find($req->id)->delete();
        return response()->json();
    }
}
