<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\deleteItem;
use App\User;
use Validator;
class AnggotaController extends Controller
{
    public function index ()
    {
         $users = User::all();
         return view('admin.anggota.index')->with('users', $users);
    }

    public function create()
    {
            return view('admin.anggota.adduser');
    }

    public function store(Request $request)
    {
       
        $validator = $this->validate(request(), [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'      
      ]);
         // dd($validator);
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

          $user->save();
          return redirect('/anggota');
    }

    public function destroy($id)
    {
        $user =User::find($id);
        $user->delete();
        return redirect('/anggota');
    }

     public function deleteItem(Request $req)
    {
        User::find($req->id)->delete();
        return response()->json();
    }
}   
