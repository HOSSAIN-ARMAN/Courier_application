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
                'name' => 'Express Delivery (Only dhaka)',
            ],
            [
                'id' => 2,
                'name' => 'Inside Dhaka (Some Day)',
            ],
            [
                'id' => 3,
                'name' => 'Inside Dhaka (Next day)',
            ],
            [
                'id' => 4,
                'name' => 'Dhaka suburbs (Next day)',
            ],
            [
                'id' => 5,
                'name' => 'Outside Dhaka',
            ],

        ]);
    }
}
