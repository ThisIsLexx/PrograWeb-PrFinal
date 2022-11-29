<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Platillo;

class PlatilloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Platillo::create([
            'user_id' => '1',
            'nombre_platillo' => 'Camarones Empanizados',
            'tipo_platillo' => 'camarones',
            'tam_platillo' => 'grande',
            'precio_platillo' => '145',
            'info_platillo' => 'Son camarones empanizados',
        ]);

        Platillo::create([
            'user_id' => '1',
            'nombre_platillo' => 'Aguachile Verde',
            'tipo_platillo' => 'camarones',
            'tam_platillo' => 'grande',
            'precio_platillo' => '145',
            'info_platillo' => 'Es aguachile, que puedo decir',
        ]);

        Platillo::create([
            'user_id' => '2',
            'nombre_platillo' => 'Filete Empanizado',
            'tipo_platillo' => 'filetes',
            'tam_platillo' => 'grande',
            'precio_platillo' => '95',
            'info_platillo' => 'Es un fileton empanizado, si señor',
        ]);

        Platillo::create([
            'user_id' => '2',
            'nombre_platillo' => 'Coctel de Camaron y Pulpo',
            'tipo_platillo' => 'cocteles',
            'tam_platillo' => 'mediano',
            'precio_platillo' => '95',
            'info_platillo' => 'Es un coctel, mediano, de camaron y pulpo',
        ]);
    }
}
