<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeachingMaterial;
use App\Models\SettingSchedule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SettingScheduleRequest;

class SettingScheduleController extends Controller
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
        return view("SettingSchedules.create",$param);
    }

    public function store(SettingScheduleRequest $request)
    {
        $data=$request->all();
        $form=new SettingSchedule;
        unset($data['_token']);
        $form->fill($data)->save();
        return redirect(route("schedule.generation_schedule",['setting_schedule'=>$form->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($schedule)
    {
        $schedule_content=SettingSchedule::find($schedule)->first();
        return view("SettingSchedules.show",["schedule_content"=>$schedule_content]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($schedule)
    {
        $schedule_content=SettingSchedule::find($schedule)->first();
        return view("SettingSchedules.edit",["schedule_content"=>$schedule_content]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingScheduleRequest $request, $schedule)
    {
        $schedule_content=$request->all();
        $form=SettingSchedule::find($schedule)->first();
        unset($schedule_content["_token"]);
        $form->fill($schedule_content)->save();
        return redirect(route('setting_schedule.show',['schedule'=>$schedule]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($schedule)
    {
        $schedule_content=SettingSchedule::find($schedule)->first();
        $for_goal_id=$schedule_content->for_goal_id;
        $schedule_content->delete();
        return redirect(route('for_goal.show',['for_goal'=>$for_goal_id]));
    }
}
