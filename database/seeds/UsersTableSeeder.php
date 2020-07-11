<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate users table
        User::truncate();

        $faker = \Faker\Factory::create();

        // Check all users have same password,
        // hash it before the loop to prevent slowing down seeder.
        $password = Hash::make('toptal');

        // Create admin
        User::create([
            'name' => 'Admiistrator',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);

        // Generate users
        for($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
