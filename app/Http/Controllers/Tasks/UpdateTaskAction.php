<?php
declare(strict_types=1);
namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTask;
use App\Http\Requests\UpdateTasks;
use App\Task;

/**
 * Class UpdateTaskAction
 * @package App\Http\Controllers\Tasks
 */
class UpdateTaskAction extends Controller
{
    /**
     * @param UpdateTask $request
     * @param Task $task
     * @return array
     */
    public function __invoke(UpdateTask $request, Task $task): array
    {
        $task->is_complete = $request->post('is_complete');
        $task->save();

        return $task->toArray();
    }
}
