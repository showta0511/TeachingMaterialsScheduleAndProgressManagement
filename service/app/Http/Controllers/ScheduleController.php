<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingSchedule;
use App\Models\Schedule;
use App\Models\ForTheGoal;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ScheduleRequest;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    //setting_scheduleからスケジュールの保存内容を編集してから、作成できるようにする
    public function generation_schedule($setting_schedule)
    {
        // 一日何ページするかで作成する//
        $form = SettingSchedule::find($setting_schedule);
        //使うデータを変数に保存
        $first_day = $form->first_day;
        $first_page = $form->first_page;
        $last_page = $form->last_page;
        $daily_learning_page = $form->daily_learning_page;
        $for_goal_id = $form->for_goal_id;
        //進めるページ数を求める
        $learning_page = Schedule::learning_page($first_page, $last_page);
        //教材を進める期間を求める
        $learning_period = Schedule::learning_period($learning_page, $daily_learning_page);
        //教材の終了日を求める
        $end_date_of_learning = Schedule::end_date_of_learning($first_day, $learning_period);
        //送信//
        $param = compact("for_goal_id", "first_page", "last_page", "daily_learning_page", "first_day", "learning_period", "end_date_of_learning", "setting_schedule");
        return view('Schedules.generation_schedule', $param);
    }

    public function generation_schedule_save(Request $request)
    {
        $schedules = $request->all();
        unset($schedules["_token"]);
        $user_id = $request->input("user_id");
        $for_goal_id = $request->input("for_goal_id");
        $setting_schedule_id = $request->input("setting_schedule_id");
        $date = $request->input("date");
        $first_page = $request->input("first_page");
        $last_page = $request->input("last_page");

        //array_mapでcallbackをnullにして一つにしたい順に配列を設置する
        //保存したいレコードの配列ができる
        $values = array_map(null, $user_id, $for_goal_id, $setting_schedule_id, $date, $first_page, $last_page);

        //keyの配列を作る
        $key = array('user_id', 'for_goal_id', 'setting_schedule_id', 'date', 'first_page', 'last_page');

        //array_combineを使ってvalueのkeyをカラム名に変更する
        foreach ($values as $value) {
            $form = new Schedule;
            $schedule = array_combine($key, $value);
            $form->fill($schedule)->save();
        }

        return redirect(route("for_goal.show", ["for_goal" => $for_goal_id[0]]));
    }


    public function store(ScheduleRequest $request)
    {
        $schedule = $request->all();

        $form = new Schedule;
        unset($schedule["_token"]);
        $form->fill($schedule)->save();
        return redirect(route("schedule.edit", ["schedule" =>$form->setting_schedule_id ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($schedule)
    {
        $schedules = Schedule::where("setting_schedule_id", $schedule)->get();

        $param = compact("schedules");
        return view("Schedules.edit", $param);
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
        $request = $request->all();
        unset($request["_token"]);
        $form = Schedule::find($schedule);
        $form->fill($request)->save();
        return redirect(route("schedule.edit", ["schedule" => $form->setting_schedule_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($schedule)
    {
        $schedule = Schedule::find($schedule);
        $schedule->delete();
        return redirect(route("for_goal.show", ["for_goal" => $schedule->for_goal_id]));
    }

    public function all_destroy($setting_schedule)
    {
        $schedules = Schedule::where('setting_schedule_id', $setting_schedule)->get();
        foreach ($schedules as $schedule) {
            $for_goal_id = $schedule->for_goal_id;
            $schedule->delete();
        }
        return redirect(route("for_goal.show", ["for_goal" => $for_goal_id]));
    }
}
