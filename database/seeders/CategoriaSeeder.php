<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ahora = now();
        DB::table('categorias')->insert([
            [
                'id' => 1,
                'nombre' => 'Calzado',
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ],
            [
                'id' => 2,
                'nombre' => 'Ropa Superior',
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ],
            [
                'id' => 3,
                'nombre' => 'Pantalones',
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ]
        ]);
    }
}
