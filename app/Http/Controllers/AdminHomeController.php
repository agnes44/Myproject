<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin_user');
        $this->middleware('admin_user');
    }

    public function index ()
    {
        return view("admin.admin-home");
    }
}
