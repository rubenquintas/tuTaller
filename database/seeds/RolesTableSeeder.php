<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Cliente',
            'slug'=> 'cliente',
        ]);

        DB::table('roles')->insert([
            'name' => 'Taller',
            'slug'=> 'taller',
        ]);
        
        DB::table('roles')->insert([
            'name' => 'Concesionario',
            'slug'=> 'concesionario',
        ]);

        DB::table('roles')->insert([
            'name' => 'Compraventa',
            'slug'=> 'compraventa',
        ]);
        
        DB::table('roles')->insert([
            'name' => 'Recambios',
            'slug'=> 'recambios',
        ]);
    }
}
