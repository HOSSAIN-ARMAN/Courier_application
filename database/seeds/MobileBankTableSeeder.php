<?php

use Illuminate\Database\Seeder;

class MobileBankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin\MobileBank::insert([
           [
               'id' => 1,
               'name' => 'Bkash',
           ],
            [
                'id' => 2,
                'name' => 'Rocket',
            ],
            [
                'id' => 3,
                'name' => 'Nogod',
            ],

        ]);
    }
}
