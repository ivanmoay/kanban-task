<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//Route::apiResource('notes', \App\Http\Controllers\Api\NoteController::class);
//Route::apiResource('task', TaskController::class);
// Route::get('posts', 'PostController@index');
// Route::group(['prefix' => 'task'], function () {
//     Route::post('store', 'TaskController@store');
//     Route::get('edit/{id}', 'TaskController@edit');
//     Route::post('update/{id}', 'TaskController@update');
//     Route::delete('delete/{id}', 'TaskController@delete');
// });
//Route::post('store', [TaskController::class, 'store']);
// Route::middleware('api')->group(function () {
//     Route::resource('tasks', TaskController::class);
// });
Route::middleware('api')->group(function () {
    //Route::resource('tasks', TaskController::class);
    Route::apiResource('tasks', TaskController::class);
});