<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeachingMaterial;
use App\Models\SettingSchedule;
use App\Models\Schedule;
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
        $setting_schedule=SettingSchedule::find($schedule);
        $schedule=Schedule::where("setting_schedule_id",$setting_schedule->id)->first();
        $teaching_material=TeachingMaterial::find($setting_schedule->teaching_material_id);
        $param=compact("setting_schedule","schedule","teaching_material");
        return view("SettingSchedules.show",$param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($setting_schedule)
    {
        $schedule_content=SettingSchedule::find($setting_schedule)->first();
        $teaching_materials=TeachingMaterial::where("user_id",Auth::id())->get();
        $param=compact("schedule_content","setting_schedule","teaching_materials");
        return view("SettingSchedules.edit",$param);
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
        $form=SettingSchedule::find($schedule);
        unset($schedule_content["_token"]);
        $form->fill($schedule_content)->save();
        return redirect(route('setting_schedule.show',['setting_schedule'=>$schedule]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($setting_schedule_id)
    {
        Schedule::where("setting_schedule_id",$setting_schedule_id)->delete();
        $setting_schedule=SettingSchedule::find($setting_schedule_id);
        $setting_schedule->delete();
        $for_goal_id=$setting_schedule->for_goal_id;
        return redirect(route('for_goal.show',['for_goal'=>$for_goal_id]));
    }

}
