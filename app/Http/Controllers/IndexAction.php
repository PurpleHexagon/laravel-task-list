<?php
declare(strict_types=1);
namespace App\Http\Controllers;

/**
 * Class IndexAction
 * @package App\Http\Controllers
 */
class IndexAction extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $tasks = \App\Task::orderBy('created_at')->get()->toArray();
        return view('todo-list', ['tasks' => $tasks]);
    }
}
