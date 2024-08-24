<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agama = [
            'Islam',
            'Katolik',
            'Kristen',
            'Hindu',
            'Budha',
        ];
        foreach ($agama as $a) {
            Agama::create([
                'nama_agama' => $a
            ]);
        }
    }
}
