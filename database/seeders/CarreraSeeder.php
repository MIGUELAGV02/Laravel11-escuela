<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener IDs de universidades existentes
        $universidades = DB::table('universidades')->pluck('id_universidad');

        for ($i = 1; $i <= 5; $i++) {
            DB::table('carreras')->insert([
                'nombre' => $faker->jobTitle,
                'estatus' => $faker->randomElement(['activo', 'inactivo']),
                'id_universidad1' => $faker->randomElement($universidades), // Relacionar con una universidad aleatoria
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
