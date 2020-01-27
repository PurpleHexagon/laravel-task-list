<?php
declare(strict_types=1);
namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class GetTasksAction
 * @package App\Http\Controllers\Tasks
 */
class GetTasksAction extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        $user = Auth::user();

        $tasks = Task::orderBy('created_at')->where(['user_id' => $user->id])->get()->toArray();

        return $tasks;
    }
}
