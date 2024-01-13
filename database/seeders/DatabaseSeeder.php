<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * usando Storage
         * en tiempo  de ejecución
         *

        use Illuminate\Support\Facades\Storage;

        $disk = Storage::build([
            'driver' => 'local',
            'root' => '/path/to/root',
        ]);

        $disk->put('image.jpg', $content);
         **/

        /**
         * usando Storage
         **/
        $folders = ['images' => ['icons', 'avatars', 'flags'], 'cursos', 'posts'];
        foreach ($folders as $folder) {
            if (is_array($folder)) {
                // dd(array_key_first($folders));
                if (Storage::exists('\\public\\' . array_key_first($folders))) {
                    Storage::deleteDirectory('\\public\\' . array_key_first($folders));
                }
                Storage::makeDirectory('\\public\\' . array_key_first($folders));
                foreach ($folder as $f) {
                    if (Storage::exists('\\public\\' . array_key_first($folders) . '\\' . $f)) {
                        Storage::deleteDirectory('\\public\\' . array_key_first($folders) . '\\' . $f);
                    }
                    Storage::makeDirectory('\\public\\' . array_key_first($folders) . '\\' . $f);
                }
            } else {
                if (Storage::exists('\\public\\' . $folder)) {
                    Storage::deleteDirectory('\\public\\' . $folder);
                }
                Storage::makeDirectory('\\public\\' . $folder);
            }
        }
        // Storage::disk('local')->put('example.txt', 'Contents 3221Contenido');// storage/app/
        // echo asset('local').'/file.txt ';

        // Storage::copy($folder, public_path().'banca.yaml');
        // dd(public_path(), storage_path(), public_path("storage"), storage_path('storage'), env('APP_URL').'/public/storage', $folders, $folder);

        $this->call([
            TablaSeeder::class,
            menuSeeder::class,
            //
            // PaisSeeder::class,
            // DireccionSeeder::class,
            // TelefonoSeeder::class,
            CategoriaSeeder::class,
            MarcadorSeeder::class,
            //
            RoleSeeder::class,
            UserSeeder::class,
            //
            EntidadSeeder::class,
            // BancaSeeder::class,
            // MouvementSeeder::class,
            // CursoSeeder::class,
            // ClientSeeder::class,
            // ProjectSeeder::class,
            // InvoiceSeeder::class,
        ]);
    }
}
