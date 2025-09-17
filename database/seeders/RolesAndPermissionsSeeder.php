<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Section;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        /**
         * =========
         * PERMISSIONS
         * =========
         */

        // create permissions for users
        $section = Section::create(['name' => 'users', 'translation' => 'usuarios']);
        Permission::create(['name' => 'index users', 'section_id' => $section->id]);
        Permission::create(['name' => 'create users', 'section_id' => $section->id]);
        Permission::create(['name' => 'edit users', 'section_id' => $section->id]);
        Permission::create(['name' => 'delete users', 'section_id' => $section->id]);

        // create permissions for categories
        $section = Section::create(['name' => 'categories', 'translation' => 'categorías']);
        Permission::create(['name' => 'index categories', 'section_id' => $section->id]);
        Permission::create(['name' => 'create categories', 'section_id' => $section->id]);
        Permission::create(['name' => 'edit categories', 'section_id' => $section->id]);
        Permission::create(['name' => 'delete categories', 'section_id' => $section->id]);
        
        // create permissions for subcategories
        $section = Section::create(['name' => 'subcategories', 'translation' => 'subcategorías']);
        Permission::create(['name' => 'index subcategories', 'section_id' => $section->id]);
        Permission::create(['name' => 'create subcategories', 'section_id' => $section->id]);
        Permission::create(['name' => 'edit subcategories', 'section_id' => $section->id]);
        Permission::create(['name' => 'delete subcategories', 'section_id' => $section->id]);

        // create permissions for questions
        $section = Section::create(['name' => 'questions', 'translation' => 'preguntas']);
        Permission::create(['name' => 'index questions', 'section_id' => $section->id]);
        Permission::create(['name' => 'create questions', 'section_id' => $section->id]);
        Permission::create(['name' => 'edit questions', 'section_id' => $section->id]);
        Permission::create(['name' => 'delete questions', 'section_id' => $section->id]);
        
        // create permissions for answers
        $section = Section::create(['name' => 'answers', 'translation' => 'respuestas']);
        Permission::create(['name' => 'create answers', 'section_id' => $section->id]);
        Permission::create(['name' => 'show answers', 'section_id' => $section->id]);

        // create permissions for observations
        $section = Section::create(['name' => 'observations', 'translation' => 'observaciones']);
        Permission::create(['name' => 'create observations', 'section_id' => $section->id]);

        // create permissions for announcements
        $section = Section::create(['name' => 'announcements', 'translation' => 'convocatorias']);
        Permission::create(['name' => 'index announcements', 'section_id' => $section->id]);
        Permission::create(['name' => 'create announcements', 'section_id' => $section->id]);
        Permission::create(['name' => 'edit announcements', 'section_id' => $section->id]);
        Permission::create(['name' => 'delete announcements', 'section_id' => $section->id]);

        // create permissions for repositories
        $section = Section::create(['name' => 'repositories', 'translation' => 'repositorios']);
        Permission::create(['name' => 'index repositories', 'section_id' => $section->id]);
        Permission::create(['name' => 'edit repositories', 'section_id' => $section->id]);
        Permission::create(['name' => 'show repositories', 'section_id' => $section->id]);

        // create permissions for evaluations
        $section = Section::create(['name' => 'evaluations', 'translation' => 'evaluaciones']);
        Permission::create(['name' => 'index evaluations', 'section_id' => $section->id]);
        Permission::create(['name' => 'edit evaluations', 'section_id' => $section->id]);

        /**
         * ====
         * ROLES
         * ====
         */

        // create admin role
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'usuario']);
        
        if( config('app.is_evaluable') ){
            $role = Role::create(['name' => 'evaluador']);
            $role->givePermissionTo(['create announcements', 'edit announcements']);
            $role->givePermissionTo(['create observations']);
            $role->givePermissionTo(['edit evaluations']);
            $role->givePermissionTo(['index users']);
        }
    }
}
