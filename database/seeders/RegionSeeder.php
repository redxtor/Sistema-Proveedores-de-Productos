<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserción de Regiones Establecidas por el catálogo
        DB::table('regions')->insert(
            [ 'region' => 'Región Noreste', 'created_at' => now()],
        );
        DB::table('regions')->insert(
            [ 'region' => 'Región Occidente', 'created_at' => now()],
        );
        DB::table('regions')->insert(
            [ 'region' => 'Región Oriente', 'created_at' => now()],
        );
        DB::table('regions')->insert(
            [ 'region' => 'Región Centronorte', 'created_at' => now()],
        );
        DB::table('regions')->insert(
            [ 'region' => 'Región Centrosur', 'created_at' => now()],
        );
        DB::table('regions')->insert(
            [ 'region' => 'Región Suroeste', 'created_at' => now()],
        );
        DB::table('regions')->insert(
            [ 'region' => 'Región Sureste', 'created_at' => now()],
        );
    }
}
