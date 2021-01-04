<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 15; $i++) {
            Task::create([
                'title' => 'タスク' . $i,
                'content' => 'タスク内容' . $i,
                'person_in_charge' => '担当者' . $i,
            ]);
        }
    }
}
