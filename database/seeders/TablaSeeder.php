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
        // crea indice de tablas
        $tab_ind = [
            config('constantes.PROFESIONES') => 'Profesiones',
            config('constantes.OPCIONES_SI_NO') => 'opciones si/no',
            config('constantes.MONEDAS') => 'monedas',
            config('constantes.UNIDADES_MEDIDAS') => 'unidades medidas',
            config('constantes.CORREO_ELECTRÓNICO_PREDETERMINADO') => 'correo electrónico predeterminado',
            config('constantes.TIPO_DIRECCION') => 'tipo dirección',
            config('constantes.TIPO_TELEFONO') => 'tipo Teléfono',
            config('constantes.TIPO_EMAIL') => 'tipo eMail',
            config('constantes.TIPO_ENTIDAD') => 'tipo entidad',

            config('constantes.OTRO') => 'otro',

            config('constantes.BANCA') => 'banca',
            config('constantes.CAMPOS_A_EXPORTAR_PREDETERMINADO') => 'campos a exportar predeterminado',
            config('constantes.GASTOS') => 'gastos',
        ];

        // crea profesiones
        $tabla[config('constantes.PROFESIONES')] = ['Ejecutivo', 'Doctor', 'Empresario', 'Dibujante', 'Arquitecto', 'Analista', 'Programador', 'Enfermera', 'Contador', 'Profesor', 'Sin Profesion'];

        //crea opciones
        $tabla[config('constantes.OPCIONES_SI_NO')] = [['tab_nombre' => 'Si', 'tab_tipoValor' => 'boolean', 'tab_valor1' => true], ['tab_nombre' => 'No', 'tab_tipoValor' => 'boolean', 'tab_valor1' => false]];
        //crea monedas
        $tabla[config('constantes.MONEDAS')] = ['euro', 'dolar', 'peso'];

        //crea unidades medidas
        $tabla[config('constantes.UNIDADES_MEDIDAS')] = [['tab_nombre' => 'kilometro', 'tab_tipoValor' => 'string', 'tab_valor1' => 'km'], ['tab_nombre' => 'millas', 'tab_tipoValor' => 'string', 'tab_valor1' => 'mi'], ['tab_nombre' => 'Litro', 'tab_tipoValor' => 'string', 'tab_valor1' => 'Lt'], ['tab_nombre' => 'centímetro', 'tab_tipoValor' => 'string', 'tab_valor1' => 'cm'], ['tab_nombre' => 'metro cuadrado', 'tab_tipoValor' => 'string', 'tab_valor1' => 'm2'], ['tab_nombre' => 'metro', 'tab_tipoValor' => 'string', 'tab_valor1' => 'mt']];

        //crea correo electrónico predeterminado
        $tabla[config('constantes.CORREO_ELECTRÓNICO_PREDETERMINADO')] = ['ramuelcl@gmail.com'];

        //crea tipo de dirección
        $tabla[config('constantes.TIPO_DIRECCION')] = ['Casa', 'Trabajo', 'Otro'];

        //crea tipo de teléfono
        $tabla[config('constantes.TIPO_TELEFONO')] = ['Casa', 'Trabajo', 'Movil', 'fax', 'telecopiadora', 'otro'];

        //crea tipo de email
        $tabla[config('constantes.TIPO_EMAIL')] = ['particular', 'empresa', 'otro'];

        //crea tipo de entidad
        $tabla[config('constantes.TIPO_ENTIDAD')] = ['Perfil', 'Cliente', 'Vendedor', 'Cli_Vend'];

        $tabla[config('constantes.OTRO')] = ['1', '2', '3'];

        // crea datos de la banca
        $tabla[config('constantes.BANCA')] = [
            [
                'tab_nombre' => 'REIGN',
                'tab_descripcion' => 'pagos de clientes',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1,
            ],
            [
                'tab_nombre' => 'DIOURON',
                'tab_descripcion' => 'pagos de clientes',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 2,
            ],
            [
                'tab_nombre' => 'PUVIS',
                'tab_descripcion' => 'pagos de clientes',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 9,
            ],
            [
                'tab_nombre' => 'AC2 PRODUCTION',
                'tab_descripcion' => 'pagos de clientes',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 22,
            ],
            [
                'tab_nombre' => 'CRUCELISA ARISTIZABAL',
                'tab_descripcion' => 'movimientos personales',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 69,
            ],
            [
                'tab_nombre' => 'REGINA',
                'tab_descripcion' => 'movimientos personales',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 70,
            ],
            [
                'tab_nombre' => 'Navigo',
                'tab_descripcion' => 'proveedores',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1500,
            ],
            [
                'tab_nombre' => 'SFR',
                'tab_descripcion' => 'proveedores',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1501,
            ],
            [
                'tab_nombre' => 'Google YouTube',
                'tab_descripcion' => 'proveedores',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1502,
            ],
            [
                'tab_nombre' => 'Orange',
                'tab_descripcion' => 'proveedores',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1503,
            ],
            [
                'tab_nombre' => 'Samsung',
                'tab_descripcion' => 'proveedores',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1504,
            ],
            [
                'tab_nombre' => 'Sosh',
                'tab_descripcion' => 'proveedores',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1503,
            ],
            [
                'tab_nombre' => 'Free',
                'tab_descripcion' => 'proveedores',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1506,
            ],
            [
                'tab_nombre' => 'FORMULE DE COMPTE ',
                'tab_descripcion' => 'La Poste',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1600,
            ],
            [
                'tab_nombre' => 'DIRECTION GENERAL',
                'tab_descripcion' => 'IMPOTS',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1601,
            ],
            [
                'tab_nombre' => 'MUNOZ ALBUERNO',
                'tab_descripcion' => 'movimientos personales',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 99,
            ],
            [
                'tab_nombre' => 'FORFAITAIRE TRIMESTRIEL',
                'tab_descripcion' => 'La Poste',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1600,
            ],
            [
                'tab_nombre' => 'ACHAT CB',
                'tab_descripcion' => 'Compras Carte Blue',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1700,
            ],
            [
                'tab_nombre' => 'AMAZON',
                'tab_descripcion' => 'Compras Carte Blue',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1700,
            ],
            [
                'tab_nombre' => 'CDISCOUNT',
                'tab_descripcion' => 'Compras Carte Blue',
                'tab_tipoValor' => 'integer',
                'tab_valor1' => 1700,
            ],
        ];
        //crea campos a exportar predeterminado
        $tabla[config('constantes.CAMPOS_A_EXPORTAR_PREDETERMINADO')] = [
            ['tab_nombre' => 'tiempos', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
            ['tab_nombre' => 'pausa', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
            ['tab_nombre' => 'proyecto', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
            ['tab_nombre' => 'Tiempo Extra', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
            ['tab_nombre' => 'Monto', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
            ['tab_nombre' => 'Tarifa', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
            ['tab_nombre' => 'Trabajo', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
            ['tab_nombre' => 'Cliente', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
            ['tab_nombre' => 'Estado', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
            ['tab_nombre' => 'Etiqueta', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
            ['tab_nombre' => 'Nota', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
            ['tab_nombre' => 'Gastos', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
            ['tab_nombre' => 'Kilometraje', 'tab_tipoValor' => 'boolean', 'tab_valor1' => 1],
        ];
        //crea gastos
        $tabla[config('constantes.GASTOS')] = [
            ['tab_nombre' => 'Compras', 'tab_tipoValor' => 'boolean', 'tab_valor1' => true], // suma
            ['tab_nombre' => 'saldo anterior a descontar', 'tab_tipoValor' => 'boolean', 'tab_valor1' => false], // resta
            ['tab_nombre' => 'saldo anterior a sumar', 'tab_tipoValor' => 'boolean', 'tab_valor1' => true], //suma
        ];

        foreach ($tab_ind as $tab => $titulo) {
            $id = 0;
            Tabla::create([
                'tab_tabla' => $tab,
                'tab_id' => $id,
                'tab_nombre' => $titulo,
                'is_active' => false,
            ]);
            foreach ($tabla[$tab] as $key => $value) {
                $id = $id + 10;
                // dump([$key, $value]);
                if (is_array($value)) {
                    $tab_nombre = $value['tab_nombre'];
                    $tab_tipoValor = $value['tab_tipoValor'];
                    $tab_valor1 = $value['tab_valor1'];
                } else {
                    $tab_nombre = $value;
                    $tab_tipoValor = null;
                    $tab_valor1 = null;
                }

                Tabla::create([
                    'tab_tabla' => $tab,
                    'tab_id' => $id,
                    'tab_nombre' => $tab_nombre,
                    'tab_descripcion' => null,
                    'is_active' => true,
                    'tab_tipoValor' => $tab_tipoValor,
                    'tab_valor1' => $tab_valor1,
                ]);
            }
        }
    }
}
