<?php

use Illuminate\Database\Seeder;

class ParcelTyepTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin\ParcelType::insert([
            [
              'id' => 1,
              'name' => 'Inside Dhaka'
            ],
            [
                'id' => 2,
                'name' => 'Dhaka Sub Area'
            ],
        ]);
    }
}
