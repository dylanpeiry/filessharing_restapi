<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'admin',
                'email'=>'admin@fs.net',
                'password'=>bcrypt('SuperADM'),
                'id_role'=>2
            ],
            [
                'name'=>'user1',
                'email'=>'user1@fs.net',
                'password'=>bcrypt('SuperUSER'),
                'id_role'=>1
            ],
        ]);
        //
    }
}
