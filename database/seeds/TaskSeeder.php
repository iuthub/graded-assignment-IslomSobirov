<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'title' => "Task of first user",
            'user_id' => 1
        ]);

        DB::table('tasks')->insert([
            'title' => "Second task of first user",
            'user_id' => 1
        ]);

        DB::table('tasks')->insert([
            'title' => "Task of second user",
            'user_id' => 2
        ]);

        DB::table('tasks')->insert([
            'title' => "Second task of second user",
            'user_id' => 2
        ]);
    }
}
