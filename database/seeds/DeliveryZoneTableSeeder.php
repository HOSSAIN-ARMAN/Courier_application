<?php

use Illuminate\Database\Seeder;

class DeliveryZoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin\DeliveryZone::insert([
           [
               'id' => 1,
               'name' => 'Gabtoli(zone 1)'
           ],
            [
                'id' => 2,
                'name' => 'Darus salam(zone 1)'
            ],
            [
                'id' => 3,
                'name' => 'Kollyanpur(zone 1)'
            ],
            [
                'id' => 4,
                'name' => 'Shyamoli(zone 1)'
            ],
            [
                'id' => 5,
                'name' => 'Adabor(zone 1)'
            ],
            [
                'id' => 6,
                'name' => 'Mohammadpur(zone 1)'
            ],
        ]);
    }
}
