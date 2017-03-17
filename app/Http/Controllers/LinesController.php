<?php

namespace App\Http\Controllers;
use DB;
use App\Lines;
use App\outlines;
use Illuminate\Http\Request;

class LinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ide = DB::table('lines')
                    ->select('*')
                    ->paginate(2);

        return view('lines.index', ['ide' => $ide]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ide = DB::table('outlines')->get();
        return view('lines.plus',['ide' => $ide]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lines = new  Lines;
        $lines->title = $request->title;
        $lines->id_outlines = $request->id_outlines;
        $lines->save();

        return redirect('lines')-> with('message', 'lines telah diupdate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lines = Lines::find($id);
        return view('lines.show',compact('lines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ide = outlines::get();
        $lines = Lines::where('id',$id)->first();
        return view('lines.edit',['lines' => $lines, 'outlines' => $ide,]);
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

        $lines = Lines::find($id);
        $lines->title = $request->title;
        $lines->save();

        return redirect('lines')-> with('message', 'lines telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lines =Lines::find($id);
        $lines->delete();
        return redirect('/lines');
    }
}
