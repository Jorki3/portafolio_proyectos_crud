<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'title' => 'Gestor de citas',
                'description' => 'Gestor de citas para clinica de salud.',
                'image' => '1.jpg',
                'isPublic' => 1
            ],
            [
                'title' => 'Rutas y camiones',
                'description' => 'Aplicación que muestra la rutas de los camiones y del transporte publico que hay en la ciudad',
                'image' => '2.jpg',
                'isPublic' => 1
            ],
            [
                'title' => 'Que ver?',
                'description' => 'Proyecto que muestra que novedades de peliculas y series se encuentran en los cines y en los diferentes servicios de streamming',
                'image' => '3.jpg',
                'isPublic' => 1
            ],
            [
                'title' => 'Copyfy',
                'description' => 'Proyecto clon de la aplicación spotify',
                'image' => '4.jpg',
                'isPublic' => 0
            ],
            [
                'title' => 'Gestion de citas',
                'description' => 'Gestor de citas para clinica de salud.',
                'image' => '1.jpg',
                'isPublic' => 1
            ],
            [
                'title' => 'Food2Me',
                'description' => 'Aplicación de servicio de repartidores de comida estilo UberEats.',
                'image' => '6.jpg',
                'isPublic' => 1
            ],
            [
                'title' => 'Bro',
                'description' => 'Aplicación que solo le envia por mensaje de algun amigo la palabra bro :p',
                'image' => '7.jpg',
                'isPublic' => 0
            ],
        ];

        DB::table('projects')->insert($data);
    }
}
