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
            'name' => 'Admin',
            'email' => 'ucreate_admin@yopmail.com',
            'password' => bcrypt('ucreate@123'),
            'user_type_id' => 1,
        ]);
    }
}
