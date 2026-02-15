<?php

namespace Database\Seeders;

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
        $this->call([
            CategoriesTableSeeder::class, // または CategorySeeder::class の正しい方1つ
            UserSeeder::class,           // 管理者ユーザーなどを作成
        ]);
        \App\Models\Contact::factory(35)->create();
    }
}
