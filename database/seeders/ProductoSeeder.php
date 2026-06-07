<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ahora = now();
        DB::table('productos')->insert([
            [
                'id' => 1,
                'nombre' => 'Tenis Nike Air Max 270 - Talla 40',
                'precio' => 580000,
                'stock_actual' => 15,
                'stock_minimo' => 5,
                'categoria_id' => 1,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ],
            [
                'id' => 2,
                'nombre' => 'Tenis Adidas Ultraboost - Talla 38',
                'precio' => 620000,
                'stock_actual' => 2,
                'stock_minimo' => 8,
                'categoria_id' => 1,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ],
            [
                'id' => 3,
                'nombre' => 'Camiseta Básica Oversize Blanca - M',
                'precio' => 85000,
                'stock_actual' => 50,
                'stock_minimo' => 20,
                'categoria_id' => 2,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ],

            [
                'id' => 4,
                'nombre' => 'Hoodie Negro Algodón - L',
                'precio' => 145000,
                'stock_actual' => 4,
                'stock_minimo' => 10,
                'categoria_id' => 2,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ],

            [
                'id' => 5,
                'nombre' => 'Jeans Slim Fit Azul - Talla 32',
                'precio' => 180000,
                'stock_actual' => 25,
                'stock_minimo' => 15,
                'categoria_id' => 3,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ],
            [
                'id' => 6,
                'nombre' => 'Joggers de Entrenamiento Gris - S',
                'precio' => 120000,
                'stock_actual' => 3,
                'stock_minimo' => 7,
                'categoria_id' => 3,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ],
            [
                'id' => 7,
                'nombre' => 'Tenis Puma Rider - Talla 41',
                'precio' => 320000,
                'stock_actual' => 12,
                'stock_minimo' => 5,
                'categoria_id' => 1,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ],
            [
                'id' => 8,
                'nombre' => 'Chaqueta Denim Clásica - M',
                'precio' => 210000,
                'stock_actual' => 1,
                'stock_minimo' => 5,
                'categoria_id' => 2,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ],
            [
                'id' => 9,
                'nombre' => 'Shorts Deportivos Pro - L',
                'precio' => 95000,
                'stock_actual' => 30,
                'stock_minimo' => 10,
                'categoria_id' => 3,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ],
            [
                'id' => 10,
                'nombre' => 'Tenis Jordan Retro 1 - Talla 42',
                'precio' => 850000,
                'stock_actual' => 2,
                'stock_minimo' => 3,
                'categoria_id' => 1,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ]
        ]);
    }
}
