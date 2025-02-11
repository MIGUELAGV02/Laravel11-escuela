<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener IDs de carreras existentes
        $carreras = DB::table('carreras')->pluck('id_carrera');

        for ($i = 1; $i <= 10; $i++) {
            DB::table('grupos')->insert([
                'nombre' => 'Grupo ' . $faker->randomLetter . $i,
                'clave' => strtoupper($faker->bothify('GRU###')),
                'estatus' => $faker->randomElement(['activo', 'inactivo']),
                'id_carrera1' => $faker->randomElement($carreras), // Relacionar con una carrera aleatoria
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
