<?php

use App\Task;
use Illuminate\Http\Request;

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

Route::middleware([])->post('/tasks', function (Request $request) {
    $task = new Task();
    $task->fill([
        'user_id' => $request->post('user_id'),
        'title' => $request->post('title'),
        'details' => $request->post('details'),
    ]);

    $task->save();
    return $task->toArray();
});
