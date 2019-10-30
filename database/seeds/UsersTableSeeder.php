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
            "name" => "Admin Tester",
            "email" => "admin@tester.com",
            "password" => Hash::make("saberpro"),
            "role_id" => 1
        ]);

        // Crea el usuario "User Dummy" en la tabla "users" con rol "doc-est-inv".
        DB::table("users")->insert([
            "name" => "User Tester",
            "email" => "user@tester.com",
            "password" => Hash::make("saberpro"),
            "role_id" => 2
        ]);

        DB::table("users")->insert([
            "name" => "Guest Tester",
            "email" => "guest@tester.com",
            "password" => Hash::make("saberpro"),
            "role_id" => 3
        ]);
    }
}
