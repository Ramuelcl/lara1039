<?php

// use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\{App, Artisan, File, Route};
use App\Http\controllers\banca\BancaController;

Route::get('/blog', function () {
    return 'blog';
})->name('blog');

// se redirige
// Route::redirect('/ancien', '/');
// se redirigen en forma permanente
// Route::redirect('/ancien', '/', 301);
// Route::permanentRedirect('/ancien', '/');
// Route::get('/entidades', function () {
//     return view('livewire.lwentidades');
// })->name('entidades');
Route::get('/entidades', 'BancaController@showEntidades')->name('entidades');

// llamo la vista con una función anónima
Route::get('/', function () {
    return view('welcome');
})->name('Home');
// llamo la vista con parámetros
Route::get('/user/{id}/{name}', function ($id, $name) {
    return view('welcome');
})->name('users.nombre');

// llamo directamente a la vista
Route::view('/contact', 'Contact')->name('contact');
// con parámetros
// Route::view('/contact', 'Contact', ['name' => 'Ramuel'])->name('contact');

Route::group([], function () {
    // Route::get('/prueba', function () {
    //     return 'prueba';
    // })->name('prueba');

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
require __DIR__ . '/admin.php';
require __DIR__ . '/banca.php';
