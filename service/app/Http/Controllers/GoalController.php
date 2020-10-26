<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;

use App\Http\Requests\GoalRequest;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function index(){
        $goal=Goal::find(Auth::id());
        $for_the_goal=null;
        $param=['goal'=>$goal,'for_the_goals'=>$for_the_goal];
        return view('Goals.index',$param);
    }

    public function create(){
        return view('Goals.create');
    }

    public function store(GoalRequest $request){
        $form=new Goal;
        $goal=$request->all();
        unset($goal['_token']);
        $form->fill($goal)->save();
        return redirect(route('goal.index'));
    }
}
