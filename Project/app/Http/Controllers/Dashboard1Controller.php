<?php

namespace App\Http\Controllers;

use App\comment;
use Illuminate\Http\Request;

class Dashboard1Controller extends Controller
{
    public function index(){
        
        return view('layouts_back_end.dashboard');
    }
}
