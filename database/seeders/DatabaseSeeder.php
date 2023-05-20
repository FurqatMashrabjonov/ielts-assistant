<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRole;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
//
//         \App\Models\User::factory()->create([
//             'name' => 'Admin',
//             'email' => 'admin@mail.ru',
//             'password' => bcrypt('admin12345'),
//             'role' => UserRole::SUPER_ADMIN
//         ]);
//        $this->call(TelegraphBotSeeder::class);
        $this->call(CambridgeSeeder::class);
    }
}
