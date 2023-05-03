<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'nombre' => 'Administrador',
            'Descripción' => 'Administrador de la pagina',
        ]);

        DB::table('roles')->insert([
            'nombre' => 'Empleado',
            'Descripción' => 'Empleado de las empresas',
        ]);

        DB::table('roles')->insert([
            'nombre' => 'Cliente',
            'Descripción' => 'Administrador de la pagina',
        ]);
    }
}
