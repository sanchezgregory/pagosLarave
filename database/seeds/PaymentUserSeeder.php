<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_user')->insert([
            'user_id' => rand(1, 3),
            'payment_id' => 1,
        ]);

        DB::table('payment_user')->insert([
            'user_id' => rand(1, 3),
            'payment_id' => 2,
        ]);

        DB::table('payment_user')->insert([
            'user_id' => rand(1, 3),
            'payment_id' => 3,
        ]);
    }
}