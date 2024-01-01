<?php
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
// use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\{App, Artisan, File, Route};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified']) //'role:admin'
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::resource('/roles', RoleController::class);
        Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
        Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
        Route::resource('/permissions', PermissionController::class);
        Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
        Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
        Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
        Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
        Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
    });

Route::group([], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('Home');

    Route::get('/prueba', function () {
        return 'prueba';
    })->name('prueba');

    Route::get('/storagelink', function () {
        // Crear el enlace simbólico
        Artisan::call('storage:link');

        // Crear directorios si no existen
        $directories = ['app', 'avatars', 'flags', 'icons'];
        foreach ($directories as $directory) {
            $target = '../../storage/app/public/images/' . $directory;
            $shortcut = public_path('storage/images/' . $directory);

            // Crear el directorio si no existe
            if (!File::isDirectory($shortcut)) {
                File::makeDirectory($shortcut, 0777, true, true);
            }

            // Crear el enlace simbólico si no existe
            if (!File::exists($shortcut)) {
                symlink($target, $shortcut);
            }
        }
        $source = public_path('images/guzanet.png');
        $target = public_path('storage/images/app/guzanet.png');

        // Cargar y crear el archivo SVG con el contenido
        // $target = public_path('images/guzanet.svg');
        // $svgContent = file_get_contents($target);
        // file_put_contents($source, $svgContent);

        // Copiar el archivo a guzanet.svg
        copy($source, $target);

        return "Enlace simbólico y directorios creados correctamente. <a href='/'>Volver a la página principal</a> <a href='/readstorage'>mostrarlos</a>";
    });

    Route::get('/readstorage', function () {
        $directories = ['app', 'avatars', 'flags'];
        foreach ($directories as $directory) {
            $target = '/storage/app/public/images/' . $directory;
            $targetFolder = base_path() . $target;
            if (File::isDirectory($targetFolder)) {
                dump($targetFolder);
            }
        }
        $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '\\storage';
        // dump( $linkFolder);
        return "Enlaces: \n linkFolder=$linkFolder \n. <a href='/'>Volver a la página principal</a>";
    });

    // Define idioma
    Route::get('/greeting/{locale}', function ($locale) {
        if (!in_array($locale, ['en', 'es', 'fr'])) {
            // abort(400);
            $locale = 'fr';
        }
        App::setLocale($locale);
        session(['locale' => $locale]);
        // dump(session('locale'));
        return "Enlaces: \n locale=$locale\n. <a href='/'>Volver a la página principal</a>";
    });
});

require __DIR__ . '/auth.php';
