<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'name' => 'Prototype maquette',
                'description' => 'Création du prototype maquette CNMH',
            ],
            [
                'name' => 'Prototype d\'application',
                'description' => 'Création du prototype d\'application CNMH',
            ]
        ]);
        
        // table Tasks
        DB::table('tasks')->insert([
            [
                'name' => 'Installer admin LTE',
                'description' => 'Installer adminLTE sur le prototype maquette CNMH',
                'project_Id' => '1',
            ],
            [
                'name' => 'Page Projets',
                'description' => 'Création de la page Projets avec admin LTE',
                'project_Id' => '1',
            ],
            [
                'name' => 'Installer admin LTE',
                'description' => 'Installer avec admin LTE',
                'project_Id' => '2',
            ],
            [
                'name' => 'Migration',
                'description' => 'Création des tables Projets et Tâches dans la migration',
                'project_Id' => '1',
            ],
        ]);

        // table usesr
        DB::table('users')->insert([
            [
                'firstName' => 'AChaou',
                'lastName' => 'Hamid',
                'email' => 'hamid@gmail.com',
                'password' => '$2y$12$e80ITC5S0HOD7JY95GuBrukneqN/8vlxGMC5zAiLvZY/u1Et8LTk.',
                'role' => 'chefProjet',
            ],
            [
                'firstName' => 'AChaou',
                'lastName' => 'khalid',
                'email' => 'khalid@gmail.com',
                'password' => '$2y$12$7sXmPx2VQmsZDn9csOKTCedEU2FEI2KhXTvrjS/bfxx4F.gCWqfIe',
                'role' => 'member',
            ],
            [
                'firstName' => 'ADNAN',
                'lastName' => 'ADNANO',
                'email' => 'adnan@gmail.com',
                'password' => '$2y$12$VtYQ/ZleIrKNKf.S.6LqLejUoS.YvBlVUVKyBlko4nTSNzqtaBQ2K',
                'role' => 'member',
            ],
            [
                'firstName' => 'Betrji',
                'lastName' => 'Jalil',
                'email' => 'jalil@gmail.com',
                'password' => '$2y$12$0FbShrjlTCJ7dUvdnUsCQeaEztepI0S.0BRhl.2AWU2rU9jd5ZIb.',
                'role' => 'member',
            ]
        ]);
    }
}