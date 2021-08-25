<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $names = ['empresa', 'parceiro', 'solicitação', 'gerenciamento', 'usuário','perfil', 'permissão'];

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'empresa.ver']);
        Permission::create(['name' => 'empresa.criar']);
        Permission::create(['name' => 'empresa.editar']);
        Permission::create(['name' => 'empresa.excluir']);
        Permission::create(['name' => 'empresa.admin']);

        // create permissions
        Permission::create(['name' => 'parceiro.ver']);
        Permission::create(['name' => 'parceiro.criar']);
        Permission::create(['name' => 'parceiro.editar']);
        Permission::create(['name' => 'parceiro.excluir']);
        Permission::create(['name' => 'parceiro.admin']);

        // create permissions
        Permission::create(['name' => 'solicitação.ver']);
        Permission::create(['name' => 'solicitação.criar']);
        Permission::create(['name' => 'solicitação.editar']);
        Permission::create(['name' => 'solicitação.excluir']);
        Permission::create(['name' => 'solicitação.admin']);

        // create permissions
        Permission::create(['name' => 'gerenciamento.ver']);
        Permission::create(['name' => 'gerenciamento.criar']);
        Permission::create(['name' => 'gerenciamento.editar']);
        Permission::create(['name' => 'gerenciamento.excluir']);
        Permission::create(['name' => 'gerenciamento.admin']);

        // create permissions
        Permission::create(['name' => 'usuário.ver']);
        Permission::create(['name' => 'usuário.criar']);
        Permission::create(['name' => 'usuário.editar']);
        Permission::create(['name' => 'usuário.excluir']);
        Permission::create(['name' => 'usuário.admin']);

        // create permissions
        Permission::create(['name' => 'exame.ver']);
        Permission::create(['name' => 'exame.criar']);
        Permission::create(['name' => 'exame.editar']);
        Permission::create(['name' => 'exame.excluir']);
        Permission::create(['name' => 'exame.admin']);

        // create permissions
        Permission::create(['name' => 'perfil.ver']);
        Permission::create(['name' => 'perfil.criar']);
        Permission::create(['name' => 'perfil.editar']);
        Permission::create(['name' => 'perfil.excluir']);
        Permission::create(['name' => 'perfil.admin']);

        // create permissions
        Permission::create(['name' => 'permissão.ver']);
        Permission::create(['name' => 'permissão.criar']);
        Permission::create(['name' => 'permissão.editar']);
        Permission::create(['name' => 'permissão.excluir']);
        Permission::create(['name' => 'permissão.admin']);

        $role = Role::create(['name' => 'Administrador']);

        $role->givePermissionTo('empresa.ver');
        $role->givePermissionTo('empresa.ver');
        $role->givePermissionTo('empresa.criar');
        $role->givePermissionTo('empresa.editar');
        $role->givePermissionTo('empresa.excluir');
        $role->givePermissionTo('empresa.admin');

        $role->givePermissionTo('parceiro.ver');
        $role->givePermissionTo('parceiro.ver');
        $role->givePermissionTo('parceiro.criar');
        $role->givePermissionTo('parceiro.editar');
        $role->givePermissionTo('parceiro.excluir');
        $role->givePermissionTo('parceiro.admin');

        $role->givePermissionTo('solicitação.ver');
        $role->givePermissionTo('solicitação.ver');
        $role->givePermissionTo('solicitação.criar');
        $role->givePermissionTo('solicitação.editar');
        $role->givePermissionTo('solicitação.excluir');
        $role->givePermissionTo('solicitação.admin');

        $role->givePermissionTo('gerenciamento.ver');
        $role->givePermissionTo('gerenciamento.ver');
        $role->givePermissionTo('gerenciamento.criar');
        $role->givePermissionTo('gerenciamento.editar');
        $role->givePermissionTo('gerenciamento.excluir');
        $role->givePermissionTo('gerenciamento.admin');

        $role->givePermissionTo('usuário.ver');
        $role->givePermissionTo('usuário.ver');
        $role->givePermissionTo('usuário.criar');
        $role->givePermissionTo('usuário.editar');
        $role->givePermissionTo('usuário.excluir');
        $role->givePermissionTo('usuário.admin');

        $role->givePermissionTo('exame.ver');
        $role->givePermissionTo('exame.ver');
        $role->givePermissionTo('exame.criar');
        $role->givePermissionTo('exame.editar');
        $role->givePermissionTo('exame.excluir');
        $role->givePermissionTo('exame.admin');

        $role->givePermissionTo('perfil.ver');
        $role->givePermissionTo('perfil.ver');
        $role->givePermissionTo('perfil.criar');
        $role->givePermissionTo('perfil.editar');
        $role->givePermissionTo('perfil.excluir');
        $role->givePermissionTo('perfil.admin');

        $role->givePermissionTo('permissão.ver');
        $role->givePermissionTo('permissão.ver');
        $role->givePermissionTo('permissão.criar');
        $role->givePermissionTo('permissão.editar');
        $role->givePermissionTo('permissão.excluir');
        $role->givePermissionTo('permissão.admin');

        $user = \App\Models\User::factory()->create([
            'name'      => 'Administrador',
            'email'     => 'admin@grupocma.com.br',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status'    => 'Ativo',
            'status'    => 'Ativo',
            'type'      => 'Interno',
        ]);
        $user->assignRole($role);
    }
}
