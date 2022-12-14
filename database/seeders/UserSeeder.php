<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Alexis',
            'email' => 'alexis@test.com',
            'password' => Hash::make('password'),
            'rol' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Omar',
            'email' => 'omar@test.com',
            'password' => Hash::make('password'),
            'rol' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Jose',
            'email' => 'jose@test.com',
            'password' => Hash::make('password'),
            'rol' => 'user',
        ]);
    }
    
}
