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
            'info_platillo' => 'Camarones empanizados con pan molido y especias, acompañados de ensalada, arroz y verduras cocidas',
        ]);

        Platillo::create([
            'user_id' => '1',
            'nombre_platillo' => 'Aguachile Verde',
            'tipo_platillo' => 'camarones',
            'tam_platillo' => 'grande',
            'precio_platillo' => '145',
            'info_platillo' => 'Camarón cocido en jugo de limón, acompañado de salsa especial de la casa con picante al gusto, pepino picado y cebolla morada',
        ]);

        Platillo::create([
            'user_id' => '2',
            'nombre_platillo' => 'Filete Empanizado',
            'tipo_platillo' => 'filetes',
            'tam_platillo' => 'grande',
            'precio_platillo' => '95',
            'info_platillo' => 'Filete de cazón preparado con pan molido con especias, acompañado de ensalada, arroz y verduras cocidas',
        ]);

        Platillo::create([
            'user_id' => '2',
            'nombre_platillo' => 'Coctel de Camaron y Pulpo',
            'tipo_platillo' => 'cocteles',
            'tam_platillo' => 'mediano',
            'precio_platillo' => '95',
            'info_platillo' => 'Delicioso coctel preparado con Jitomate, cebolla, aguacate, salsa ketchup y jugo de limón, acompañado con tostadas y galleta salada',
        ]);

        Platillo::create([
            'user_id' => '1',
            'nombre_platillo' => 'Camarones Jr a la mantequilla',
            'tipo_platillo' => 'camarones',
            'tam_platillo' => 'chico',
            'precio_platillo' => '85',
            'info_platillo' => 'Deliciosos camarones marinados con mantequilla y especias, acompañados por ensalada, arroz y verdura cocida (Pueden ser pelados o con cascara)',
        ]);

        Platillo::create([
            'user_id' => '2',
            'nombre_platillo' => 'Coctel mediano de pulpo',
            'tipo_platillo' => 'cocteles',
            'tam_platillo' => 'mediano',
            'precio_platillo' => '120',
            'info_platillo' => 'Delicioso coctel preparado con Jitomate, cebolla, aguacate, salsa ketchup y jugo de limón, acompañado con tostadas y galleta salada',
        ]);

        Platillo::create([
            'user_id' => '1',
            'nombre_platillo' => 'Filete al mojo de ajo',
            'tipo_platillo' => 'filetes',
            'tam_platillo' => 'grande',
            'precio_platillo' => '95',
            'info_platillo' => 'Filete sazonado con especias, ajo picado, y margarina, acompañado de ensalada, arroz y verduras cocidas',
        ]);

        Platillo::create([
            'user_id' => '2',
            'nombre_platillo' => 'Atún en salsa de mango',
            'tipo_platillo' => 'filetes',
            'tam_platillo' => 'grande',
            'precio_platillo' => '130',
            'info_platillo' => 'Medallón de atún marinado con margarina, acompañado por una deliciosa salsa agridulce de mango, ensalada, arroz y verduras cocidas',
        ]);
    }
}
