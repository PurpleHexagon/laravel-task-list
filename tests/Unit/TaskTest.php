<?php

namespace Tests\Unit;

use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskTest extends TestCase
{
    /**
     * Test task can be filled
     *
     * @return void
     */
    public function testTaskCanBeFilled()
    {
        $task = new Task();
        $task->fill(['title' => 'Test Title', 'details' => 'Test Details']);
        $this->assertEquals('Test Title', $task->title);
        $this->assertEquals('Test Details', $task->details);
    }
}
