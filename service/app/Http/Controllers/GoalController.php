<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;

use App\Http\Requests\GoalRequest;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function index(){
        $goal=Goal::where('user_id',Auth::id())->first();
        $for_the_goal=null;
        $param=compact('goal','for_the_goal');
        return view('Goals.index',$param);
    }

    public function show($goal){
        $goal=Goal::find($goal);
        return view('Goals.show',["goal"=>$goal]);
    }

    public function create(){
        return view('Goals.create');
    }

    public function store(GoalRequest $request){
        $form = new Goal;
        $goal = $request->all();
        unset($goal['_token']);
        $form->fill($goal)->save();
        return redirect(route('goal.show',['goal'=>$form->id]));
    }

    public function edit($edit){
        $form = Goal::find($edit);
        return view("Goals.edit",["form"=>$form]);
    }

    public function update(GoalRequest $request,$update){
        $form =  Goal::find($update);
        $goal = $request->all();
        unset($goal['_token']);
        $form->fill($goal)->save();
        return redirect(route('goal.show',['goal'=>$form->id]));
    }

    public function del_conform($del){
        $goal=Goal::find($del);
        return view('Goals.del_conform',["goal"=>$goal]);
    }

    public function destroy($del){
        Goal::find($del)->delete();
        return redirect(route('goal.index'));
    }
}
