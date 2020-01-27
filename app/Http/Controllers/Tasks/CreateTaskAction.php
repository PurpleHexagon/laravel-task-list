<?php
declare(strict_types=1);
namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTasks;
use App\Task;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $task = new Task();
        $task->fill([
            'title' => $request->post('title'),
            'details' => $request->post('details')
        ]);

        $task->user_id = $user->id;

        $task->save();
        return $task->toArray();
    }
}
