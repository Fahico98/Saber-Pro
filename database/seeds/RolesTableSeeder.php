<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        // Para que la tabla "roles" pueda ser sembrada primero debe ser vaciada.
        // Crea el rol "administrador" en la tabla "roles".
        DB::table("roles")->insert([
            "name" => "administrador"
        ]);

        // Crea el rol "doc-est-inv" en la tabla "roles".
        // Esto es una abreviación de "docentes-estudiantes-investigadores".
        DB::table("roles")->insert([
            "name" => "doc-est-inv"
        ]);
    }
}
