<?php

use Illuminate\Database\Seeder;

class PickUpTypeTabeleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Merchent\PickUpType::insert([
            [
                'id' => 1,
                'name' => 'Electronics Item'
            ],
            [
                'id' => 2,
                'name' => 'Clothes'
            ],
            [
                'id' => 3,
                'name' => 'Others'
            ],
            [
                'id' => 4,
                'name' => 'Dry Food'
            ],
        ]);
    }
}
