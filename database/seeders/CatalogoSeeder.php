<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Catalogo;

class CatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalogo::create([
            'tipo' => 'camarones',
            'tam' => 'chico',
            'precio' => '85',
        ]);

        Catalogo::create([
            'tipo' => 'camarones',
            'tam' => 'grande',
            'precio' => '145',
        ]);

        Catalogo::create([
            'tipo' => 'aguachiles',
            'tam' => 'grande',
            'precio' => '145',
        ]);

        Catalogo::create([
            'tipo' => 'filetes',
            'tam' => 'chico',
            'precio' => '75',
        ]);

        Catalogo::create([
            'tipo' => 'filetes',
            'tam' => 'grande',
            'precio' => '95',
        ]);

        Catalogo::create([
            'tipo' => 'cocteles',
            'tam' => 'chico',
            'precio' => '85',
        ]);

        Catalogo::create([
            'tipo' => 'cocteles',
            'tam' => 'mediano',
            'precio' => '95',
        ]);

        Catalogo::create([
            'tipo' => 'cocteles',
            'tam' => 'grande',
            'precio' => '130',
        ]);
    }
}
