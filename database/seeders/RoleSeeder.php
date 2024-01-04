<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    private $roles = [
        // tabla roles
        // ['Super-Admin', 'web'],
        ['admin', 'web'],
        ['user', 'web'],
        ['guest', 'web'],
        // Sistemas
        ['Blog', 'sys'],
        ['Banca', 'sys'],
        ['HoraTrabajo', 'sys'],
    ];
    private $permissions = [
        // tabla permisos
        'access',
        'view',
        'new',
        'edit',
        'delete',
        'printer',
        'export',
        //
        'publish',
        'unpublish',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create roles and assign created permissions
        foreach ($this->roles as $key => $value) {
            if ($value[0] === 'Super-Admin') {
                continue;

                // El Super-Admin se maneja en este archivo
                // App\Prividers\AuthServiceProvider.php

                // $this->registerPolicies();
                // Implicitly grant "Super-Admin" role all permission checks using can()
                // Gate::before(function ($user, $ability) {
                //     if ($user->hasRole('Super-Admin')) {
                //         return true;
                //     }
                // });
            }
            $role = Role::create(['name' => $value[0], 'guard_name' => 'web']);
            // dump('role', $role->name);
            // create permissions
            foreach ($this->permissions as $pvalue) {
                // dump(['Role' => $value[0], 'Pers' => $pvalue]);
                if ($value[1] === 'web') {
                    $name = $pvalue;
                } else {
                    if ($value[0] !== 'Blog' && substr($pvalue, -7) === 'publish') {
                        continue;
                    } else {
                        $name = "$value[0] $pvalue";
                    }
                }

                if (!Permission::where('name', '=', "$name")->exists()) {
                    $permissions = Permission::create(['name' => "$name"]);
                    // dump($permissions->name);
                }
            }
        }

        // $role = Role::create(['name' => 'writer']);
        // $permission = Permission::create(['name' => 'edit articles']);
        // Se puede asignar un permiso a un rol mediante uno de estos métodos:

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        // Se pueden sincronizar varios permisos con un rol mediante uno de estos métodos:

        // $role->syncPermissions($permissions);
        // $permission->syncRoles($roles);
        // Se puede eliminar un permiso de un rol mediante uno de estos métodos:

        // $role->revokePermissionTo($permission);
        // $permission->removeRole($role);
    }
}
