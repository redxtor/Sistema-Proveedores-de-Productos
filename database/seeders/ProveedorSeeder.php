<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Faker\Factory as Faker;

use Database\Factories\ProveedorFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Utiliza el factory de Proveedor para generar 10000 instancias con datos falsos
        Proveedor::factory()->count(1000)->create();
    }
}
