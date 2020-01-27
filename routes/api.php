<?php

use App\Http\Requests\CreateTasks;
use App\Http\Requests\UpdateTask;
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

Route::middleware([])->get('/tasks', function (Request $request) {
    $tasks = Task::orderBy('id')->get()->toArray();

    return $tasks;
});

Route::middleware([])->post('/tasks', function (CreateTasks $request) {
    $task = new Task();
    $task->fill([
        'user_id' => $request->post('user_id'),
        'title' => $request->post('title'),
        'details' => $request->post('details'),
    ]);

    $task->save();
    return $task->toArray();
});

Route::middleware([])->put('/tasks/{task}', function (UpdateTask $request, Task $task) {
    $task->is_complete = $request->post('is_complete');
    $task->save();

    return $task->toArray();
});
