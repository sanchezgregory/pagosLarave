<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            'importe' => rand(150, 1500),
        ]);

        DB::table('payments')->insert([
            'importe' => rand(150, 1500),
        ]);

        DB::table('payments')->insert([
            'importe' => rand(150, 1500),
        ]);

        DB::table('payments')->insert([
            'importe' => rand(150, 1500),
        ]);
    }
}
