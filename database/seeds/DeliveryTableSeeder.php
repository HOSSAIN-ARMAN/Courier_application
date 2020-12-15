<?php

use Illuminate\Database\Seeder;

class DeliveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin\Delivery::insert([

            [
                'id' => 1,
                'parcel_type_id' => 2,
                'name' => 'none',
            ],
            [
                'id' => 2,
                'parcel_type_id' => 1,
                'name' => 'Express Delivery (Only dhaka)',
            ],
            [
                'id' => 3,
                'parcel_type_id' => 1,
                'name' => 'Inside Dhaka (Some Day)',
            ],
            [
                'id' => 4,
                'parcel_type_id' => 1,
                'name' => 'Inside Dhaka (Next day)',
            ],
            [
                'id' => 5,
                'parcel_type_id' => 1,
                'name' => 'Dhaka suburbs (Next day)',
            ],
            [
                'id' => 6,
                'parcel_type_id' => 1,
                'name' => 'Outside Dhaka',
            ],

        ]);
    }
}
