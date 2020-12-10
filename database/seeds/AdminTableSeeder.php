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
    {
        \App\Admin::insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("password")
        ]);
    }
}
