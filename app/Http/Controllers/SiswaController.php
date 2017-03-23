<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SiswaController extends Controller
{
    public function index()
    {
        return view('admin-auth/siswa');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin_user');
        $this->middleware('siswa',['except' => 'test']);
    }

    public function test()
    {
        return view('admin-auth/test');
    }
}
