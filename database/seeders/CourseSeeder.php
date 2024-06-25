<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Curso 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed nisi mollitia quia maxime hic placeat aliquid, at nesciunt.',
                'price' => '22',
            ],
            [
                'name' => 'Curso 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed nisi mollitia quia maxime hic placeat aliquid, at nesciunt.',
                'price' => '134',
            ],
            [
                'name' => 'Curso 3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed nisi mollitia quia maxime hic placeat aliquid, at nesciunt.',
                'price' => '37',
            ],
            [
                'name' => 'Curso 4',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed nisi mollitia quia maxime hic placeat aliquid, at nesciunt.',
                'price' => '442',
            ],
            [
                'name' => 'Curso 5',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed nisi mollitia quia maxime hic placeat aliquid, at nesciunt.',
                'price' => '244',
            ],
            // Agrega más preguntas y respuestas aquí
        ];

        // Insertar los registros en la tabla de FAQ
        foreach ($courses as $course) {
            Course::insert($course);
        }
    }
}
