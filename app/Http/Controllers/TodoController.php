<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\todo;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $todos =todo::all();
         return view('todo.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
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
        $todo=$request->all();
        dd($todo);
        $todo = new todo;
        $todo->body = $request->body;

        $todo->save();

        return redirect('todo')-> with('message', 'todo telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $todo = todo::find($id);
       return view('todo.single',compact('todo'));
       /*return view('todos.single')->with('todos', $todo); */               
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $todo = todo::find($id);
         return view('todo.edit',compact('todo'));

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
        $todo = todo::find($id);
        $todo->body = $request->body;
        
        $todo->save();

        return redirect('todo')-> with('message', 'todo telah diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo =todo::find($id);
        $todo->delete();
        return redirect('/todo');
    }

    public function check()
    {
         if( $request->has('test') ){
            true;
        }
    }
}
