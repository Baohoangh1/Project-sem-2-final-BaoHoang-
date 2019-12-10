<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'test1',
             'email' => 'test1@gmail.com',
             'password' => bcrypt('111111'),
             'lastname' => 'Mr',
             'firstname' => 'test1'
        ]);
    }
}
