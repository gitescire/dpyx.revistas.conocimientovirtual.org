<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Evaluation;
use App\Models\Question;
use App\Models\Repository;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Cristian',
            'phone' => '5512328187',
            'email' => 'cguzman@ibsaweb.com',
            'password' => bcrypt('¡MyP4ssw0rd!')
        ]);

        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Omar',
            'phone' => null,
            'email' => 'ovilla@ibsaweb.com',
            'password' => bcrypt('Pruebas123')
        ])->assignRole('admin');

        $userAdmin = User::create([
            'name' => 'Nydia Lopez',
            'phone' => null,
            'email' => 'nlopez@escire.mx',
            'password' => bcrypt('1Aprender3948.')
        ])->assignRole('admin');

        if (config('app.is_evaluable')) {
            $userEvaluator = User::create([
                'name' => 'Nydia Evaluador',
                'phone' => null,
                'email' => 'valni.info@gmail.com',
                'password' => bcrypt('1Aprender3948.')
            ])->assignRole('evaluador');
        }

        $user = User::create([
            'name' => 'Nydia Repositorio',
            'phone' => null,
            'email' => 'vallei__oswal@hotmail.com',
            'password' => bcrypt('1Aprender3948.')
        ])->assignRole('usuario');

        $repository = Repository::create([
            'responsible_id' => $user->id,
            'name' => 'escire',
            'status' => 'en progreso',
        ]);

        if (config('app.is_evaluable')) {
            $evaluation = Evaluation::create([
                'evaluator_id' => $userEvaluator->id,
                'status' => 'en progreso',
            ]);
        } else {
            $evaluation = Evaluation::create([
                'status' => 'en progreso',
            ]);
        }

        $evaluation->assignRepository($repository);


        /**
         * Create empty answers for each question
         */

        Question::get()->each(function ($question) use ($evaluation) {
            Answer::create([
                'evaluation_id' => $evaluation->id,
                'question_id' => $question->id,
                'is_updateable' => 1,
            ]);
        });

        /**
         * ===============
         * USERS FOR CONCYTEC
         * ===============
         */

        // ADMINISTRADOR
        // usuario: concytec
        // contraseña: G6&6$usTop*T

        $userAdmin = User::create([
            'name' => 'Cristian Calabrano Torres',
            'phone' => null,
            'email' => 'ccalabrano@uchile.cl',
            'password' => bcrypt('Santiago.2020')
        ])->assignRole('admin');

        $userAdmin = User::create([
            'name' => 'concytec',
            'phone' => null,
            'email' => 'dangeles@concytec.gob.pe',
            'password' => bcrypt('G6&6$usTop*T')
        ])->assignRole('admin');

        if (config('app.is_evaluable')) {
            $userEvaluator = User::create([
                'name' => 'evaluador',
                'phone' => null,
                'email' => 'dianasaq12@gmail.com',
                'password' => bcrypt('31evaluador.e')
            ])->assignRole('evaluador');
        }

        $user = User::create([
            'name' => 'repositorio',
            'phone' => null,
            'email' => 'alicia@concytec.gob.pe',
            'password' => bcrypt('blp!utuPhu1A')
        ])->assignRole('usuario');

        $repository = Repository::create([
            'responsible_id' => $user->id,
            'name' => 'repositorio',
            'status' => 'en progreso',
        ]);

        if (config('app.is_evaluable')) {
            $evaluation = Evaluation::create([
                'evaluator_id' => $userEvaluator->id,
                'status' => 'en progreso',
            ]);
        } else {
            $evaluation = Evaluation::create([
                'status' => 'en progreso',
            ]);
        }

        $evaluation->assignRepository($repository);

        /**
         * Create empty answers for each question
         */

        Question::get()->each(function ($question) use ($evaluation) {
            Answer::create([
                'evaluation_id' => $evaluation->id,
                'question_id' => $question->id
            ]);
        });
    }
}
