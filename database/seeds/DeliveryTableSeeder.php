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
                'id' => 2,
                'name' => 'Express Delivery (Only dhaka)',
            ],
            [
                'id' => 3,
                'name' => 'Inside Dhaka (Some Day)',
            ],
            [
                'id' => 4,
                'name' => 'Inside Dhaka (Next day)',
            ],
            [
                'id' => 5,
                'name' => 'Dhaka suburbs (Next day)',
            ],
            [
                'id' => 6,
                'name' => 'Outside Dhaka',
            ],

        ]);
    }
}
