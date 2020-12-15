<?php

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin\BankInfo::insert([
            [
              'id' => 1,
              'name' => 'DBL',
            ],
            [
                'id' => 2,
                'name' => 'Brace Bank'
            ],
            [
                'id' => 3,
                'name' => 'Trust Bank'
            ],
        ]);
    }
}
