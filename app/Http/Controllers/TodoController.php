<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\todo\deleteItem;
use App\todo;
use Auth;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $todos = Todo::where('user_id',$user)->get();
        // dd($todos);
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
        // $todo=$request->all();
        // dd($todo);
        $todo = new todo;
        // $todo = Auth::user()->id;
        $todo->body = $request->body;

        Auth::user()->todo()->save($todo);

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
       // $todo = todo::find($id);
       // return view('todo.single',compact('todo'));
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

    public function deleteItem(Request $req)
    {
        todo::find($req->id)->delete();
        return response()->json();
    }

    public function check()
    {
         if( $request->has('test') ){
            true;
        }
    }
}
