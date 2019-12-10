<?php

use Illuminate\Database\Seeder;

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
            'username' => 'BaoHoang',
             'email' => 'hqbaotrungvuong@gmail.com',
             'password' => bcrypt('BiBop261203'),
             'lastname' => 'Hoang',
             'firstname' => 'Bao'
        ]);
    }
}
