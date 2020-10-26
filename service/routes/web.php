<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', function () {
    return view('description');
})->name('description');



//GoalControllerをURI、ルート名でグループ化
Route::group(['middleware' => ['auth'],'prefix' => 'goal', 'as' => 'goal.'], function () {
    Route::get('/',[GoalController::class,'index'])->name('index');
    Route::get('create',[GoalController::class,'create'])->name('create');
    Route::post('store',[GoalController::class,'store'])->name('store');
    Route::get('edit',[GoalController::class,'edit'])->name('edit');
    Route::put('update',[GoalController::class,'update'])->name('update');
    Route::get('del_conform',[GoalController::class,'del_conform'])->name('del_conform');
    Route::delete('destroy',[GoalController::class,'destroy'])->name('destroy');
});
