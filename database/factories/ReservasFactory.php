<?php

namespace Database\Factories;

use App\Models\Pistas;
use App\Models\Socios;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservas>
 */
class ReservasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hora = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00'];
        $fechaAleatoria = $this->faker->dateTimeThisYear('2024-12-31');
        return [
            "fecha" => $fechaAleatoria->format('Y-m-d'),
            "hora" => $this->faker->randomElement($hora),
            "socio_id" => $this->faker->numberBetween(1, 33),
            "pista_id" => $this->faker->numberBetween(1, 5),
        ];
    }
}
