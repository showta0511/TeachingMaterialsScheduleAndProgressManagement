<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ForTheGoalController;
use App\Http\Controllers\TeachingMaterialController;
use App\Http\Controllers\SettingScheduleController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Console\Scheduling\Schedule;

Auth::routes();

Route::get('guest',[LoginController::class,'guest_login'])->name('login.guest');

Route::get('/', function () {
    return view('description');
})->name('description');

//routeを以下のように変更
//profile           https://サービスネーム/profile.jp
//goal              https://サービスネーム/goal.jp
//for_the_goal      https://サービスネーム/goal/1.jp
//setting_schedule  https://サービスネーム/goal/1/set_schedule.jp
//schedule          https://サービスネーム/goal/1/schedule.jp

//GoalControllerをURI、ルート名でグループ化
Route::group(['middleware' => ['auth'],'prefix' => 'goal', 'as' => 'goal.'], function () {
    Route::get('/',[GoalController::class,'index'])->name('index');
    Route::get('show/{goal}',[GoalController::class,'show'])->name('show');
    Route::get('create',[GoalController::class,'create'])->name('create');
    Route::post('store',[GoalController::class,'store'])->name('store');
    Route::get('edit/{edit}',[GoalController::class,'edit'])->name('edit');
    Route::put('update/{update}',[GoalController::class,'update'])->name('update');
    Route::get('del_conform/{del}',[GoalController::class,'del_conform'])->name('del_conform');
    Route::delete('destroy/{del}',[GoalController::class,'destroy'])->name('destroy');
});

Route::group(['middleware' => ['auth'],'prefix' => 'for_goal', 'as' => 'for_goal.'], function () {
    Route::get('show/{for_goal}',[ForTheGoalController::class,'show'])->name('show');
    Route::post('store',[ForTheGoalController::class,'store'])->name('store');
    Route::get('edit/{edit}',[ForTheGoalController::class,'edit'])->name('edit');
    Route::put('update/{update}',[ForTheGoalController::class,'update'])->name('update');
    Route::get('del_conform/{del}',[ForTheGoalController::class,'del_conform'])->name('del_conform');
    Route::delete('destroy/{del}',[ForTheGoalController::class,'destroy'])->name('destroy');
});


Route::group(['middleware' => ['auth']], function () {
    //teaching_material
    Route::resource("teaching_material",TeachingMaterialController::class);
    //delete時の確認画面
    Route::get('teaching_material/del_conform/{teaching_material}',[TeachingMaterialController::class,'del_conform'])->name('teaching_material.del_conform');
    //setting_schedule
    Route::resource("setting_schedule",SettingScheduleController::class)->except(['index','create']);

    Route::get('setting_schedule/create/{for_goal_id}',[SettingScheduleController::class,'create'])->name('setting_schedule.create');

    Route::get('setting_schedule/confirmation/{for_goal_id}',[SettingScheduleController::class,'confirmation'])->name('setting_schedule.confirmation');

    //schedule
    Route::resource("schedule",ScheduleController::class);

    Route::get("schedule/generation/{setting_schedule}",[ScheduleController::class,"generation_schedule"])->name('schedule.generation_schedule');

    Route::post("schedule/generation/{setting_schedule}",[ScheduleController::class,"generation_schedule_save"])->name('schedule.generation_schedule_save');

    Route::delete("schedule/{setting_schedule}/all_destroy",[ScheduleController::class,"all_destroy"])->name('schedule.all_destroy');

});
