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
//        $old_user = DB::connection('old')->table('users')->get();
//
//        foreach ($old_users as $user) {
//            DB::connection('new')->table('users')->insert([
//                'name'     => $user->name,
//                'email'    => $user->email,
//                'password' => $user->password,
//                'old_id'   -> $user->id
//         // ...
//        ]);
//       }

        // $this->call(UsersTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(ParcelCreateFromTableSeeder::class);
        $this->call(DeliveryTableSeeder::class);
        $this->call(DeliveryZoneTableSeeder::class);
        $this->call(PickUpZoneTableSeeder::class);
        $this->call(PickUpTypeTabeleSeeder::class);
        $this->call(MobileBankTableSeeder::class);
        $this->call(BankTableSeeder::class);

    }
}
