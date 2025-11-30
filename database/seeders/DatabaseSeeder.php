<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear las 6 especialidades reales
        $specialties = [
            'Cardiología', 'Pediatría', 'Dermatología', 
            'Neurología', 'Traumatología', 'Ginecología'
        ];

        foreach ($specialties as $name) {
            Specialty::create([
                'name' => $name,
                'description' => 'Especialidad médica en ' . $name
            ]);
        }

        // 2. Crear 25 Doctores
        Doctor::factory(25)->create();

        // 3. Crear 80 Pacientes
        Patient::factory(80)->create();

        // 4. Crear 150 Citas
        Appointment::factory(150)->create();
    }
}