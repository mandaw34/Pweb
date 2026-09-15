<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Ini function index-nya
    public function index()
    {
        return view('user.index'); 
    }
}