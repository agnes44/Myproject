<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\admintodo\deleteItem;
use App\todo;
class AdminTodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admintodo = todo::all();
        return view('admin.admintodo.index')->with('admintodo', $admintodo);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.admintodo.create');
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
            'body' => 'required'
        ]);
        // $admintodo=$request->all();
        // dd($admintodo);
        $admintodo = new todo;
        $admintodo->body = $request->body;

        $admintodo->save();

        return redirect('admintodo')-> with('message', 'todo telah ditambahkan');
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
         $admintodo = todo::find($id);
         return view('admin/admintodo.edit',compact('admintodo'));
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
        $admintodo = todo::find($id);
        $admintodo->body = $request->body;
        
        $admintodo->save();

        return redirect('admintodo')-> with('message', 'todo telah diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admintodo =todo::find($id);
        $admintodo->delete();
        return redirect('/admintodo');
    }

     public function deleteItem(Request $req)
    {
        todo::find($req->id)->delete();
        return response()->json();
    }
}
