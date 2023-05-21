<?php

namespace Database\Seeders;

use App\Models\Cambridge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CambridgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 17; $i++) {
            for ($j = 1; $j <= 4; $j++) {
                $data[] = [
                    'name' => 'Cambridge ' . $i . ' Test ' . $j . ' Audio',
                    'key' => 'Cam ' . $i . ' ' . $j,
                    'audio_path' => '/audios/Cambridge' . $i . 'Test' . $j . '.mp3',
                    'pdf_path' => '/cambridge/pdf/Cambridge' . $i . 'Test' . $j . '.pdf'
                ];
            }
        }

        Cambridge::query()->insert($data);
    }
}
