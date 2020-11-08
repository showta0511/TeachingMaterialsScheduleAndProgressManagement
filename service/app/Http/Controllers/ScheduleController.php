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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $schedules = $request->all();
        unset($schedules["_token"]);
        $form=new Schedule;
        //$form->fill($schedules)->save();
        // print_r(array_keys($schedules));
        // echo "<br>";
        // print_r(array_values($schedules));
        // echo "<br>";

        $user_id=$request->input("user_id");
        print_r($user_id);
        $for_goal_id=$request->input("for_goal_id");
        print_r($for_goal_id);
        $setting_schedule_id=$request->input("setting_schedule_id");
        print_r($setting_schedule_id);
        $date=$request->input("date");
        print_r($date);
        $first_page=$request->input("first_page");
        print_r($first_page);
        $last_page=$request->input("last_page");
        print_r($last_page);
        $a = array_map(null, $user_id, $for_goal_id, $setting_schedule_id,$date,$first_page,$last_page);
        foreach ($a as $row) {
            $user_id[]=$row[0]; //noが欲しい
            $for_goal_id[]=$row[1]; //nameが欲しい
            $setting_schedule_id[]=$row[2]; //todofukenが欲しい
            $date[]=$row[3];
            $first_page[]=$row[4];
            $last_page[]=$row[5];

        }
        return $a;


        //---------------
        // $form=new Schedule;
        // unset($schedules["_token"]);
        // foreach ($schedules as $schedule){
        //     $form->fill($schedule)->save();
        //     $for_goal=$schedule->for_goal_id;
        // }

        //受け取りたい形
        // $chars={
        //     ["user_id":"4",
        //     "for_goal_id":"1",
        //     "setting_schedule_id":"1",
        //     "date":"2020-11-01",
        //     "first_page":12,
        //     "last_page":22
        // ],
        //     ["user_id":"4",
        // "for_goal_id":"1",
        // "setting_schedule_id":"1",
        // "date":"2020-11-02",
        // "first_page":12,
        // "last_page":22
        // ]
        // };
        //これをforeachで回してfillでsave

        //---------------

        // return redirect(route('for_goal.show',['for_goal'=>$for_goal]));
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
