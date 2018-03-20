<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Juanito',
            'password' => bcrypt('123'),
            'age'   => rand(18, 45)
        ]);

        User::create([
            'username' => 'Pedrito',
            'password' => bcrypt('123'),
            'age'   => rand(18, 45)
        ]);

        User::create([
            'username' => 'Carlitos',
            'password' => bcrypt('123'),
            'age'   => rand(18, 45)
        ]);


    }
}
