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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //test connection
        //form書く！


        // 毎日するページ数を使って作成
        // formからスケジュールの設定内容を取得
        // 保存

        //別table準備(設定内容、for_the_goalに紐ずく)
        //日程の差分を求める
        //開始日からカウント（カレンダーを参考にして30日で月が変わる）
        //ページ数を毎日するページ数ずつカウント
        //カウントしたものをeditに出力(formのinputタグに数字を当てはめ編集できるようにする
        //formが送信されたら保存
    }

    //setting_scheduleからスケジュールを表示し編集できるようにする
    public function generation_schedule($setting_schedule)
    {
        // 一日何ページするかで作成する//
        $form = SettingSchedule::find($setting_schedule)->first();
        //使うデータを変数に保存
        $first_day = $form->first_day;
        $first_page = $form->first_page;
        $last_page = $form->last_page;
        $daily_learning_page = $form->daily_learning_page;
        $for_goal_id = $form->for_goal_id;

        $param = compact("for_goal_id", "first_page", "last_page", "daily_learning_page", "first_day", "learning_period", "end_date_of_learning", "setting_schedule");
        return view('Schedules.generation_schedule', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        $schedules = $request->all();
        unset($schedules["_token"]);

        $user_id=$request->input("user_id");
        $for_goal_id=$request->input("for_goal_id");
        $setting_schedule_id=$request->input("setting_schedule_id");
        $date=$request->input("date");
        $first_page=$request->input("first_page");
        $last_page=$request->input("last_page");

        //array_mapでcallbackをnullにして一つにしたい順に配列を設置する
        //保存したいレコードの配列ができる
        $values = array_map(null, $user_id, $for_goal_id, $setting_schedule_id,$date,$first_page,$last_page);

        //keyの配列を作る
        $key = array('user_id', 'for_goal_id', 'setting_schedule_id','date','first_page','last_page');

        //array_combineを使ってvalueのkeyをカラム名に変更する
        foreach($values as $value){
            $form=new Schedule;
            $schedule=array_combine($key,$value);
            $form->fill($schedule)->save();
        }

        return redirect(route("for_goal.show",["for_goal"=>$for_goal_id[0]]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
