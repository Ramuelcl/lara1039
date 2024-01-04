<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\backend\UserSetting;
use App\Models\backend\Perfil;

// agregamos
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

// Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\model_has_roles;
use Spatie\Permission\Models\model_has_permissions;

class UserSeeder extends Seeder
{
    public function __construct()
    {
        $users = [
            'admin' => [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'profile_photo_path' => 'public/images/avatars/admin.png',
                'email_verified_at' => now(),
                'password' => 'Admin', //bcrypt('Admin')
                'remember_token' => Str::random(10),
            ],
            'guest' => [
                'name' => 'guest',
                'email' => 'guest@mail.com',
                'profile_photo_path' => 'public/images/avatars/guest.png',
                'email_verified_at' => now(),
                'password' => 'guest', //bcrypt('guest')
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($users as $user) {
            $u = User::create($user);
            if ($user['name'] == 'Admin') {
                // dd('creando super admin');
                $u->assignRole('admin');
                // All current roles will be removed from the user and replaced by the array given
                // $user->syncRoles(['super-admin']);
                $theme = 'light';
                $language = 'es-ES';
                // } elseif ($user['email'] === 'ramuelcl@gmail.com') {
                //     // dump('creando ' . $user['name']);
                //     $u->assignRole(['Super-Admin']); // ya no existe como Role
                //     $theme = 'light';
                //     $language = 'es-ES';
            } else {
                $u->assignRole('guest');
                $theme = 'dark';
                $language = 'fr-FR';
            }
            //guardar un registro de configuracion para el usuario
            UserSetting::create([
                'user_id' => $u['id'],
                'theme' => $theme,
                'language' => $language,
            ]);
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::factory()
        //     // ->has(UserSetting::factory()->count(1), 'userSetting')
        //     ->count(48)
        //     ->create();

        // factory(App\User::class, 25)->create()->each(function ($user) {
        //     $user->profile()->save(factory(App\UserProfile::class)->make());
        // });

        $array1 = ['light', 'dark'];
        $array2 = ['es-ES', 'fr-FR', 'en-EN'];
        // dd('llegó');
        $roles = Role::all()
            ->pluck('name')
            ->toArray();
        // $roles = array_diff($roles, ['Super-Admin']); // ya no existe
        $u = User::factory(69)
            ->create()
            ->each(function ($user) {
                // dump($user->id);
                UserSetting::factory()->create([
                    'user_id' => $user->id,
                ]);
                Perfil::factory()->create([
                    'user_id' => $user->id,
                ]);
            });
    }
}
