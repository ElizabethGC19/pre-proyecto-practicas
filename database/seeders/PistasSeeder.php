<?php

namespace Database\Seeders;

use App\Models\Pistas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PistasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i < 6; $i++) {
            Pistas::create([
                "deporte_id" => $i,
                "numero" => $i
            ]);
        }
    }
}
