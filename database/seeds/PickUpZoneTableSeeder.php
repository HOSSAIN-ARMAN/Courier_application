<?php

use Illuminate\Database\Seeder;

class PickUpZoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin\PickUpZone::insert([
            [
                'id' => 1,
                'name' => 'Dhaka'
            ],
            [
                'id' => 2,
                'name' => 'Gazipur'
            ],
            [
                'id' => 3,
                'name' => 'Narayangonj'
            ],
        ]);
    }
}
