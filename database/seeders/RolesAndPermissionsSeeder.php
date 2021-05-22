<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /**
         * Permissões
         */
        $permissions = [
            ['name' => 'edit_product'],
            ['name' => 'edit_category'],
            ['name' => 'view_order'],
            ['name' => 'view_client'],
            ['name' => 'view_analytic'], //Quantidades de Vendas e Valores
            ['name' => 'edit_user'], //Adicionar e Remover usuários(funcionários)

        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        /**
         * Funções/Roles
         */

        // Responsável por Gerir o sistema: Administrador
        $admin = Role::create(['name' => 'admin']);
        $dataAdmin = [];
        foreach (Permission::all() as $item) {
            $dataAdmin[] = $item->name;
        }
        $admin->givePermissionTo($dataAdmin);


        $editor = Role::create(['name' => 'editor']);
        $dataEditor = [];
        foreach (Permission::whereNotIn('name', ['view_analytics', 'edit_user'])->get() as $item) {
            $dataEditor[] = $item->name;
        }
        $editor->givePermissionTo($dataEditor);


        $dispatcher = Role::create(['name' => 'dispatcher']);
        $dataDispatcher = [];
        foreach (Permission::whereNotIn('name', ['view_analytics', 'edit_user', 'edit_products', 'edit_categories'])->get() as $item) {
            $dataDispatcher[] = $item->name;
        }
        $dispatcher->givePermissionTo($dataDispatcher);

        Role::create(['name' => 'client']);

        $user = \App\Models\User::factory()->create([
            'name' => 'GAdmin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'adm' => true
        ]);
        $user->assignRole($admin);

    }

}
