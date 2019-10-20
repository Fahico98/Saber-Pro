<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        // Vacía la tabla "users" antes de sembrarla.
        DB::table("users")->truncate();

        // Crea el usuario "Admin Dummy" en la tabla "users" con rol "administrador".
        DB::table("users")->insert([
            "name" => "Admin Dummy",
            "email" => "admin@dummy.com",
            "password" => Hash::make("saberpro"),
            "role_id" => 1
        ]);

        // Crea el usuario "User Dummy" en la tabla "users" con rol "doc-est-inv".
        DB::table("users")->insert([
            "name" => "User Dummy",
            "email" => "user@dummy.com",
            "password" => Hash::make("saberpro"),
            "role_id" => 2
        ]);
    }
}
