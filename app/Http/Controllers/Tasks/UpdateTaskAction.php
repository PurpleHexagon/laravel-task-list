<?php
declare(strict_types=1);
namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTask;
use App\Http\Requests\UpdateTasks;
use App\Task;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\UnauthorizedException;

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
        if (Gate::denies('update-task', $task)) {
            throw new UnauthorizedException('Not Authorized');
        }

        $task->fill([
            'title' => $request->post('title'),
            'details' => $request->post('details'),
        ]);

        $task->is_complete = $request->post('is_complete');
        $task->save();

        return $task->toArray();
    }
}
