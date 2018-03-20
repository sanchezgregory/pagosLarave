<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'users','payments','payment_user','favoriteusers'
        ]);

        $this->call(UserSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(PaymentUserSeeder::class);
        $this->call(FavoriteuserSeeder::class);

    }

    private function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
    }

}
