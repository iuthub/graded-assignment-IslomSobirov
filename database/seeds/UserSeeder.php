<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "FirstUser",
            'email' => "islomsobiroov@gmail.com",
            'password' => Hash::make('password1'),
        ]);

        DB::table('users')->insert([
            'name' => "Islom",
            'email' => "atomm262@gmail.com",
            'password' => Hash::make('password2'),
        ]);
    }
}
