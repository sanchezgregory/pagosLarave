<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favoriteusers')->insert([
            'user_id' => 1,
            'favoriteuser' => rand(1, 3),
        ]);

        DB::table('favoriteusers')->insert([
            'user_id' => 2,
            'favoriteuser' => rand(1, 3),
        ]);

        DB::table('favoriteusers')->insert([
            'user_id' => 3,
            'favoriteuser' => rand(1, 3),
        ]);
    }
}
