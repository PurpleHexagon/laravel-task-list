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

Route::middleware([])->get('/tasks', 'Tasks\GetTasksAction');
Route::middleware([])->post('/tasks', 'Tasks\CreateTaskAction');
Route::middleware([])->put('/tasks/{task}', 'Tasks\UpdateTaskAction');
