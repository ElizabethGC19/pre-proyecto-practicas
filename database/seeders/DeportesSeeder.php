<?php

namespace Database\Seeders;

use App\Models\Deportes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeportesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listadoDeportes = ['futbol', 'baloncesto', 'tenis', 'rugby', 'padel'];

        foreach ($listadoDeportes as $deporte) {
            Deportes::create([
                'nombre' => $deporte
            ]);
        }
    }
}
