<?php
declare(strict_types=1);
namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTasks;
use App\Services\TasksService;
use Illuminate\Support\Facades\Auth;

/**
 * Class CreateTaskAction
 * @package App\Http\Controllers\Tasks
 */
class CreateTaskAction extends Controller
{
    /**
     * @var TasksService
     */
    protected TasksService $tasksService;

    /**
     * CreateTaskAction constructor.
     * @param TasksService $tasksService
     */
    public function __construct(TasksService $tasksService)
    {
        $this->tasksService = $tasksService;
    }

    /**
     * @param CreateTasks $request
     * @return array
     */
    public function __invoke(CreateTasks $request): array
    {
        $user = Auth::user();
        $task = $this->tasksService->createTask($request->post('title'), $request->post('details'), $user);

        return $task->toArray();
    }
}
