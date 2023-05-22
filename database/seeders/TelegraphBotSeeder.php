<?php

namespace Database\Seeders;

use DefStudio\Telegraph\Models\TelegraphBot;



use Illuminate\Database\Seeder;

class TelegraphBotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TelegraphBot::query()->create([
           'token' => config('telegraph.token'),
            'name' => 'IELTS BOT'
        ]);
    }
}
