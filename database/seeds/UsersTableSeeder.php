<?php

class UsersTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        factory(\App\User::class)->create();
    }
}
