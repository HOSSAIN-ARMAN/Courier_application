<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(DeliveryTableSeeder::class);
        $this->call(DeliveryZoneTableSeeder::class);
        $this->call(PickUpZoneTableSeeder::class);
        $this->call(ParcelTyepTableSeeder::class);
    }
}
