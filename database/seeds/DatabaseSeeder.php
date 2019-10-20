<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        //$this->call(FacultadSeeder::class);
        //$this->call(ProgramaSeeder::class);
        //$this->call(CompetenciaSeeder::class);
        //$this->call(ResultadoDeAprendizajeSeeder::class);
    }
}
