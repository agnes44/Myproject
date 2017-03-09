<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Tasks;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = DB::table('todos')
                    ->select('*')
                    ->paginate(5);

        return view('task.index', [
            'todos' => $todos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $todos = DB::table('todos')->get();
        return view('task.plus',['todos' => $todos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new  tasks;
        $task->title = $request->title;
        $task->id_todos = $request->id_todos;
        $task->save();

        return redirect('task')-> with('message', 'task telah diupdate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = tasks::find($id);
        return view('task.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todos = todo::get();
        $item = tasks::find($id);
        return view('task.edit',[
                    'tasks' => $tasks,
                    'todos' => $todos,
            ]);
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
            'title' => 'required'
        ]);        

        $task = tasks::find($id);
        $task->title = $request->title;
        $task->save();

        return redirect('task')-> with('message', 'tasks telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =tasks::find($id);
        $item->delete();
        return redirect('/task');
    }
}
