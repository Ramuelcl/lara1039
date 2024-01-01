<?php

namespace Database\Seeders;

use App\Models\backend\Tabla;
use Illuminate\Database\Seeder;

class TablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // crea configuracion: menus
        // $Menu = ['id', 'Nombre', 'subMenu' => []];
        $tabla['Menu'] = array(
            'Menus',
            'Uno',
            'Dos',
            'Tres' => ['Categorias', 'Marcadores'],
            'Cuatro',
            'Cinco' => ['A', 'B', 'C', 'D', 'E'],
            'Seis',
            'Siete'
        );

        $m = 0;
        foreach ($tabla['Menu'] as $i => $menu1) {
            // dump(['i'=>$i, 'menu'=>$menu1]);

            $m = $m + 100;
            Tabla::factory(1)->create(
                [
                    'tabla' => 1000,
                    'tabla_id' => $m,
                    'nombre' => \is_array($menu1) ? $i : $menu1,
                    'descripcion' => null,
                    'valor1' => $i == 0 ? $i : $m,
                    'valor2' => null,
                    'valor3' => null,
                    'activo' => $i == 0 ? false : true,
                ]
            );
            if (\is_array($menu1)) {
                foreach ($menu1 as $j => $menu2) {
                    $n = $m + $j + 1;
                    Tabla::factory(1)->create(
                        [
                            'tabla' => 1000,
                            'tabla_id' => $n,
                            'nombre' => $menu2,
                            'descripcion' => null,
                            'valor1' => $m,
                            'valor2' => null,
                            'valor3' => null,
                            'activo' => $i == 0 ? false : true,
                        ]
                    );
                }
            }
        }

        // crea profesiones
        $tabla['Profesiones'] = array('0' => 'Profesiones', '1' => 'Doctor', '2' => 'Empresario', '3' => 'Dibujante', '4' => 'Arquitecto', '5' => 'Analista', '6' => 'Programador', '7' => 'Enfermera', '8' => 'Contador', '9' => 'Profesor', '99' => 'Sin Profesion');

        foreach ($tabla['Profesiones'] as $key => $value) {
            Tabla::factory(1)->create(
                [
                    'tabla' => 15000,
                    'tabla_id' => $key,
                    'nombre' => $value,
                    'descripcion' => null,
                    'activo' => $key == '0' ? false : true,
                    'valor1' => null,
                    'valor2' => null,
                    'valor3' => null,
                ]
            );
        }
    }
}
