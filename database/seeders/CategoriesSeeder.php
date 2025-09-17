<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Mantenimiento y desarrollo de políticas',
                'short_name' => 'Contenidos',
            ],
            [
                'id' => 3,
                'name' => 'Políticas de gobernanza',
                'short_name' => 'Gobernanza',
            ],
            [
                'id' => 4,
                'name' => 'Preservación digital',
                'short_name' => 'Preservación',
            ],
            [
                'id' => 5,
                'name' => 'Formatos abiertos',
                'short_name' => 'Formatos',
            ],
            [
                'id' => 6,
                'name' => 'Software',
                'short_name' => 'Software',
            ],
            [
                'id' => 7,
                'name' => 'Hardware',
                'short_name' => 'Hardware',
            ],
            [
                'id' => 8,
                'name' => 'Visibilidad',
                'short_name' => 'Accesibilidad',
            ],
            [
                'id' => 9,
                'name' => 'Interacción con los lectores',
                'short_name' => 'Difusión',
            ],
        ]);
    }
}
