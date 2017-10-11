<?php

use Lunar\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \Lunar\Admin([
        	'name' => "Admin Tester",
        	'email' => "admin@lunar.com",
        	'password' => bcrypt('lunar12345'),
        ]);

        $admin->save();
    }
}
