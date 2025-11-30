<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Specialty;

class DoctorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'phone' => fake()->phoneNumber(),
            // SIMPLIFICADO: Asumimos que ya existen especialidades (porque el Seeder las crea primero)
            'specialty_id' => Specialty::inRandomOrder()->first()->id, 
        ];
    }
}