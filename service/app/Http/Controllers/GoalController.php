<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index(){
        return view('Goals.index');
    }
}
