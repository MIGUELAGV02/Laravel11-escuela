<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener IDs existentes de universidades, carreras y grupos
        $universidades = DB::table('universidades')->pluck('id_universidad');
        $carreras = DB::table('carreras')->pluck('id_carrera');
        $grupos = DB::table('grupos')->pluck('id_grupo');

        for ($i = 1; $i <= 10; $i++) {
            DB::table('alumnos')->insert([
                'matricula' => 'A' . str_pad($i, 5, '0', STR_PAD_LEFT), // Genera matriculas como A00001, A00002...
                'nombre' => $faker->firstName,
                'ap_p' => $faker->lastName,
                'ap_m' => $faker->lastName,
                'fecha_n' => $faker->dateTimeBetween('-30 years', '-18 years'),
                'genero' => $faker->randomElement(['M', 'F']),
                'id_universidad2' => $faker->randomElement($universidades), // Relación con universidad
                'id_carrera2' => $faker->randomElement($carreras), // Relación con carrera
                'id_grupo2' => $faker->randomElement($grupos), // Relación con grupo
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
