<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    protected $model = Proveedor::class;

    public function definition(): array
    {
        $faker = Faker::create();
        return [
            // Genera un nombre único para el campo 'nombre'
            //'nombre' => $faker->unique->name(),
            'nombre' => $faker->unique()->company,
            // Genera un nombre completo aleatorio para el campo 'Razón Social'
            'razon_social' => $faker->name(),
            // Genera un número aleatorio para el campo 'numero_proveedor'
            'numero_proveedor' => $faker->randomNumber,
            // Genera una fecha aleatoria para el campo 'fecha_registro'
            'fecha_registro' => $faker->date,
            // Genera un token aleatorio de longitud 13 para el campo 'RFC'
            //'RFC' => Str::random(13),
            'RFC' => $faker->regexify('[A-Z0-9]{12}'),
            // Genera una palabra aleatoria para el campo 'imagen_random'
            //'imagen_random' => $faker->word,
            'imagen_random' => $faker->imageUrl(200, 200),
            'id_region' => $faker->numberBetween(1, 6),
            //'id_region' => \App\Models\Region::factory() // Establecimiento de Región Aleatoria
        ];
    }
}