<?php

namespace App\Http\Controllers;

use App\comment;
use Illuminate\Http\Request;

class Dashboard1Controller extends Controller
{
    public function countComment()
    {
        $count_comm = comment::table('comment')->count();
        return $count_comm;
    }
}
