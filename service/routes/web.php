<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;


Auth::routes();

Route::get('/', function () {
    return view('description');
})->name('description');



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
