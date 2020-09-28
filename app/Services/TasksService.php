<?php
declare(strict_types=1);
namespace App\Services;

use App\Task;
use App\User;

/**
 * Class TasksService
 * @package App
 */
class TasksService
{
    /**
     * @param $title
     * @param $details
     * @param User $user
     * @return Task
     */
    public function createTask($title, $details, User $user)
    {
        $task = new Task();
        $task->fill([
            'title' => $title,
            'details' => $details,
        ]);

        $task->user_id = $user->id;

        $task->save();

        return $task;
    }
}
