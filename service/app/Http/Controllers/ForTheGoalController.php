<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForTheGoalRequest;
use App\Models\ForTheGoal;
use App\Models\Schedule;
use App\Models\SettingSchedule;


class ForTheGoalController extends Controller
{

    public function store(ForTheGoalRequest $request){
        $form = new ForTheGoal;
        $for_the_goal = $request->all();
        unset($for_the_goal['_token']);
        $form->fill($for_the_goal)->save();
        return redirect(route('goal.index'));
    }

    public function show($for_goal){
        $for_goal=ForTheGoal::find($for_goal);
        $setting_schedule=SettingSchedule::where("for_goal_id",$for_goal->id)->first();
        $schedules=Schedule::where("for_goal_id",$for_goal->id)->get();
        $param=compact("setting_schedule","schedules","for_goal");
        return view('ForTheGoals.show',$param);
    }

    public function edit($edit){
        $form=ForTheGoal::find($edit);
        return view('ForTheGoals.edit',['form'=>$form]);
    }

    public function update(ForTheGoalRequest $request,$update){
        $form = ForTheGoal::find($update);
        $for_goal = $request->all();
        unset($for_goal['_token']);
        $form->fill($for_goal)->save();
        return redirect(route('for_goal.show',['for_goal'=>$form->id]));
    }

    public function del_conform($del){
        $for_goal=ForTheGoal::find($del);
        return view('ForTheGoals.del_conform',["for_goal"=>$for_goal]);
    }

    public function destroy($del){
        ForTheGoal::find($del)->delete();
        return redirect(route('goal.index'));
    }

}
