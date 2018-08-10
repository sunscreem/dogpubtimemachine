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
        if (App::Environment() != 'production') {
            DB::table('users')->insert([
                'name' => 'Admin User',
                'email' => 'admin@user.com',
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
