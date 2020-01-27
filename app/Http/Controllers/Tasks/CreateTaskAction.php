<?php
declare(strict_types=1);
namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTasks;
use App\Task;

/**
 * Class CreateTaskAction
 * @package App\Http\Controllers\Tasks
 */
class CreateTaskAction extends Controller
{
    /**
     * @param CreateTasks $request
     * @return array
     */
    public function __invoke(CreateTasks $request): array
    {
        $task = new Task();
        $task->fill([
            'user_id' => $request->post('user_id'),
            'title' => $request->post('title'),
            'details' => $request->post('details'),
        ]);

        $task->save();
        return $task->toArray();
    }
}
