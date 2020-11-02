<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\Cloner\Data;

class Schedule extends Model
{
    protected $guarded = array("id","created_at","update_at");
    
    //何日間で教材が修理おlようできるかを計算する処理
    public static function period_calculation($due_date,$first_day){
        $period=($due_date - $first_day) / (60 * 60 * 24);
        return intval($period + 1);
    }

    //進めるページ数を求める
    public static function learning_page($first_page,$last_page){
        $learning_page=$last_page-$first_page;
        return intval($learning_page);
    }
    //必要な期間を求める
    public static function learning_period($learning_page,$daily_learning_page){
        $learning_period=$learning_page/$daily_learning_page;
        return intval($learning_period);
    }
    //教材終了日を求める
    public static function end_date_of_learning($first_day,$learning_period){
        //first_dayにlearning_periodをたす
        $first_day=date($first_day);
        $end_date_of_learning = date('Y-m-d', strtotime($first_day . '+'.$learning_period.'day'));
        return date($end_date_of_learning);
    }

    public function User(){
        return $this->belongsTo("App\Models\User");
    }

    public function ForTheGoal(){
        return $this->belongsTo("App\Models\ForTheGoal");
    }

    public function SettingSchedule(){
        return $this->belongsTo("App\Models\SettingSchedule");
    }
}
