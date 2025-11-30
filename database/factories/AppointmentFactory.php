<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;
use App\Models\Doctor;

class AppointmentFactory extends Factory
{
    public function definition(): array
    {
        // Lógica para generar fecha válida (Lun-Sab, 8am-7pm)
        $date = fake()->dateTimeBetween('now', '+45 days');
        
        // Si cae domingo, le sumamos un día
        if ($date->format('N') == 7) { 
            $date->modify('+1 day');
        }

        // Ajustar hora entre 8:00 y 19:00
        $hour = fake()->numberBetween(8, 18); // Hasta las 18 para que la cita de 30min termine antes de las 19
        $minutes = fake()->randomElement([0, 30]);
        $date->setTime($hour, $minutes);

        return [
            // Asigna paciente y doctor existentes al azar
            'patient_id' => Patient::inRandomOrder()->first()->id,
            'doctor_id' => Doctor::inRandomOrder()->first()->id,
            
            'scheduled_at' => $date,
            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled', 'completed']),
            'notes' => fake()->text(50),
        ];
    }
}