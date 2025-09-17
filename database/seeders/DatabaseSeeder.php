<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(SubcategoriesSeeder::class);
        $this->call(QuestionsSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UsersSeeder::class);

        // $users = User::factory()
        //     ->count(20)->create();

        // foreach ($users as $user) {
        //     $user->assignRole(Role::get()->random()->id);
        // }
    }
}
