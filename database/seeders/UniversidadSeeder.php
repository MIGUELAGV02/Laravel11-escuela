<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('universidades')->insert([
            [
                'nombre' => 'Universidad Nacional Autónoma de México',
                'clave' => 'UNAM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Instituto Tecnológico y de Estudios Superiores de Monterrey',
                'clave' => 'ITESM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
