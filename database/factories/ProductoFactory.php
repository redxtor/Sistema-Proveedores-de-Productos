<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'nombre' => $faker->unique()->word,
            'folio' => $faker->unique()->randomNumber(),
            'cantidad' => $faker->numberBetween(1, 100),
            'unidad' => $faker->randomElement(['pieza', 'litro', 'kilogramo']),
            'precio_por_unidad' => $faker->randomFloat(2, 1, 1000),
            'fecha_ingreso' => $faker->date,
            'id_proveedor' => $faker->numberBetween(1, 1000) // Cambia el rango según la cantidad de proveedores
        ];
    }
}
