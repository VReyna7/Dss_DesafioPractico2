<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class categorias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            'nombre' => 'hogar',
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Automoviles',
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Tecnologia',
        ]);
    }
}
