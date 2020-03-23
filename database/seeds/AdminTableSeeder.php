<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   DB::table('roles')->truncate();
        DB::table('roles')->insert([
            'title'=>"General Admin",
        ]);
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            'name'=>"WorlChad General Admin",
            'email'=>"info@worlchad.org",
            'password'=>bcrypt('secret'),
            'role_id' => 1
        ]);
    }
}
