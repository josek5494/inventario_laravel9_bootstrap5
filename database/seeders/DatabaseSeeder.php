<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // CATEGORÍAS

        DB::table('categorias')->insert([
            'nombre' => 'Alimentación',
            'descripcion' => 'Comida y productos alimentarios.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Limpieza',
            'descripcion' => 'Todo lo relacionado con la limpieza.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Higiene',
            'descripcion' => 'Higiene y cuidado de las personas.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // ALMACENES

        DB::table('almacenes')->insert([
            'nombre' => 'El Sebadal',
            'localizacion' => 'Gran Canaria',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('almacenes')->insert([
            'nombre' => 'San Fernando',
            'localizacion' => 'Gran Canaria',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('almacenes')->insert([
            'nombre' => 'Santa Cruz',
            'localizacion' => 'Tenerife',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('almacenes')->insert([
            'nombre' => 'La Laguna',
            'localizacion' => 'Tenerife',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // PRODUCTOS
        
        DB::table('productos')->insert([
            'nombre' => 'Zanahoria',
            'precio' => 1.50,
            'observaciones' => 'Es naranja.',
            'id_categoria' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Patata',
            'precio' => 0.50,
            'observaciones' => 'Es redonda.',
            'id_categoria' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Detergente',
            'precio' => 3.50,
            'observaciones' => 'Para lavar la ropa a mano o en la lavadora.',
            'id_categoria' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Champú',
            'precio' => 2.50,
            'observaciones' => 'Para todo tipo de pelo.',
            'id_categoria' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Fregona',
            'precio' => 4.00,
            'observaciones' => 'Para limpiar el suelo.',
            'id_categoria' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Cepillo de dientes',
            'precio' => 1.00,
            'observaciones' => 'Con cerdas de diferente dureza.',
            'id_categoria' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // RELACION PRODUCTOS Y ALMACENES

        DB::table('productos_almacenes')->insert([
            'id_producto' => 1,
            'id_almacen' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos_almacenes')->insert([
            'id_producto' => 1,
            'id_almacen' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos_almacenes')->insert([
            'id_producto' => 2,
            'id_almacen' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos_almacenes')->insert([
            'id_producto' => 3,
            'id_almacen' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos_almacenes')->insert([
            'id_producto' => 3,
            'id_almacen' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos_almacenes')->insert([
            'id_producto' => 4,
            'id_almacen' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos_almacenes')->insert([
            'id_producto' => 4,
            'id_almacen' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos_almacenes')->insert([
            'id_producto' => 4,
            'id_almacen' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos_almacenes')->insert([
            'id_producto' => 5,
            'id_almacen' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('productos_almacenes')->insert([
            'id_producto' => 6,
            'id_almacen' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
