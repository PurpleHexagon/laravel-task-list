<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        exec("cd /var/www/html && php artisan migrate:fresh --env=testing");
    }

    /**
     * Test index route returns 200 for GET
     *
     * @return void
     */
    public function testIndexReturns200(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test tasks API GET all route returns 200
     *
     * @return void
     */
    public function testGetTasksReturns200(): void
    {
        $response = $this->get('/api/tasks');

        $response->assertStatus(200);
    }
}
