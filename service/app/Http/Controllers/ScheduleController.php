<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeachingMaterial;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ScheduleRequest;

class ScheduleController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($for_goal_id)
    {
        $teaching_materials=TeachingMaterial::where("user_id",Auth::id())->get();
        $param=compact("for_goal_id","teaching_materials");
        return view("Schedules.create",$param);
    }

    public function store(ScheduleRequest $request)
    {
        $data=$request->all();
        //リクエストデータを受け取る
        $form=new Schedule;
        unset($data['_token']);
        $form->fill($data)->save();
        //保存する
        return redirect(route("for_goal.show",["for_goal"=>$form->for_goal_id]));
    }

    public function confirmation()
    {
        return"ok!data";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($schedule)
    {
        $schedule_content=Schedule::find($schedule)->first();
        return view("Schedules.show",["schedule_content"=>$schedule_content]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($schedule)
    {
        $schedule_content=Schedule::find($schedule)->first();
        return view("Schedules.edit",["schedule_content"=>$schedule_content]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, $schedule)
    {
        $schedule_content=$request->all();
        $form=Schedule::find($schedule)->first();
        unset($schedule_content["_token"]);
        $form->fill($schedule_content)->save();
        return redirect(route('schedule.show',['schedule'=>$schedule]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($schedule)
    {
        $schedule_content=Schedule::find($schedule)->first();
        $for_goal_id=$schedule_content->for_goal_id;
        $schedule_content->delete();
        return redirect(route('for_goal.show',['for_goal'=>$for_goal_id]));
    }
}
