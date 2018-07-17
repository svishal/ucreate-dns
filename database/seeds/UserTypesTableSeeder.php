<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'name' => 'SuperAdmin',
        ]);
        DB::table('user_types')->insert([
            'name' => 'User',
        ]);
    }
}
