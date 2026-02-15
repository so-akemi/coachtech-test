<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       User::create([
     'name' => 'テストユーザー',
     'email' => 'test123@example.com', // ← これがREADMEと一致しているか
     'password' => Hash::make('coachtech135'), // ← これがREADMEと一致しているか
     ]);
    }
}
