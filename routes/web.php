<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $all_tasks = Task::get();
    return view('homepage', compact("all_tasks"));
});
Route::get('/new-task', function () {
    return view('create-task');
})->name("create.task.view");
Route::post('/store', 'App\Http\Controllers\TransactionController@store')->name('store.task');
Route::post('/update/{id}', 'App\Http\Controllers\TransactionController@update')->name('update.task');
