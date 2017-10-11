<?php

use Lunar\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \Lunar\User([
        	'name' => "User Tester",
        	'email' => "user@lunar.com",
        	'password' => bcrypt('lunar12345'),
        ]);

        $user->save();
    }
}
