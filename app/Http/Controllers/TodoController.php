<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\todo;
use Validator;
use Response;
use App\Http\Requests\todo\addItem;
use App\Http\Requests\todo\editItem;
use Illuminate\Supprot\Facades\Input;
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
         return view('todo.page',['todos' => $todos]);
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
            'title' => 'required',
            'body' => 'required',
            'due_date' => 'required'
        ]);

        $todo = new todo;
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->due_date = $request->due_date;
        
        $todo->save();

        return redirect('todo')-> with('message', 'todo telah diupdate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $item = todo::find($id);
       return view('todo.single',compact('item'));
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
         $item = todo::find($id);
        return view('todo.edit',compact('item'));
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
            'body' => 'required',
            'due_date' => 'required'
        ]);

        $todo = todo::find($id);
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->due_date = $request->due_date;
        
        $todo->save();

        /*return redirect('todo')-> with('message', 'todo telah diedit');*/

        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =todo::find($id);
        $item->delete();
        return redirect('/todo');
    }

    public function editItem(Request $req) {
        $todo = todo::findOrfail($req->id);
        $todo->title = $req->title;
        $todo->body = $req->body;
        $todo->due_date = $req->due_date;

        $todo->save();
        return response ()->json ($todo);
    }

    public function deleteItem(Request $req)
    {
        todo::find($req->id)->delete();
        return response()->json();
    }
}
