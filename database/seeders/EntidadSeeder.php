<?php
// database\seeder\EntidadSeeder.php

namespace Database\Seeders;

use App\Models\backend\Ciudad;
use App\Models\backend\Direccion;
use App\Models\backend\Email;
use App\Models\backend\Entidad;
use App\Models\backend\Pais;
use App\Models\backend\Tabla;
use App\Models\backend\Telefono;
//
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class EntidadSeeder extends Seeder
{
    /**
     * Este seeder toma datos de la tabla 'import' y los inserta en la tabla 'entidades'.
     */
    public function run(): void
    {
        $sql = File::get('Database/data/import.sql');
        DB::unprepared($sql);
        // SELECT  `id`,  `Name`,  `Given Name`,  `Additional Name`,  `Family Name`,  `Birthday`,  `Gender`,  `Location`,  `E-mail 1 - Type`,  `E-mail 1 - Value`,  `E-mail 2 - Type`,  `E-mail 2 - Value`,  `E-mail 3 - Type`,  `E-mail 3 - Value`,  `Phone 1 - Type`,  `Phone 1 - Value`,  `Phone 2 - Type`,  `Phone 2 - Value`,  `Address 1 - Type`,  `Address 1 - Formatted`,  `Address 1 - Street`,  `Address 1 - City`,  `Address 1 - PO Box`,  `Address 1 - Region`,  `Address 1 - Postal Code`,  `Address 1 - Country`,  `Address 1 - Extended Address`,  `Address 2 - Type`,  `Address 2 - Formatted`,  `Address 2 - Street`,  `Address 2 - City`,  `Address 2 - PO Box`,  `Address 2 - Region`,  `Address 2 - Postal Code`,  `Address 2 - Country`,  `Address 2 - Extended Address`,  `Organization 1 - Name`,  `Organization 1 - Title`,  `Website 1 - Type`,  `Website 1 - Value`

        if (DB::getPdo()->errorCode() !== '00000') {
            // La consulta SQL falló
            // Agregue aquí el código para manejar el error
        } else {
            // La consulta SQL se completó correctamente
            // Agregue aquí el código para continuar con el script
        }
        $rows = DB::table('import')->get();
        $count = 0;
        foreach ($rows as $row) {
            $count++;
            dump($count . ' de ' . $rows->count());
            $entidad_id = $this->fncCrearEntidad(
                'chilenos',
                $row->{'Organization 1 - Name'} ?: null,
                $row->{'Organization 1 - Title'} ?: null,
                $row->{'Given Name'} . ' ' . $row->{'Additional Name'},
                $row->{'Family Name'},
                true, // Ajusta según tus necesidades
                $this->parseDate($row->Birthday),
                $row->Gender,
            );

            // dump($row, $entidad_id);
            ///////////////////////////////////////////////
            // procesa y agrega WEB SITE a la entidad
            ///////////////////////////////////////////////
            $webToCheck = $row->{"Website 1 - Value"};

            if ($webToCheck) {
                // Realiza una consulta para buscar la página web
                $existingWeb = Email::where('nombre', $webToCheck)->first();

                if (!$existingWeb) {
                    $this->fncCrearEmailWeb($entidad_id, 'web', 'personal', $webToCheck);
                }
            }
            ///////////////////////////////////////////////
            // procesa y agrega los EMAILS a la entidad
            ///////////////////////////////////////////////
            for ($i = 1; $i <= 3; $i++) {
                // Suponiendo que hay hasta 3 correos electrónicos por entidad
                $emailTypeKey = $this->determinarTipoKey($i);
                $emailToCheck = $row->{"E-mail {$i} - Value"};

                if ($emailToCheck && filter_var($emailToCheck, FILTER_VALIDATE_EMAIL)) {
                    // Realiza una consulta para buscar el correo electrónico
                    // dump($emailToCheck);
                    $existingEmail = Email::where('nombre', $emailToCheck)->first();
                    // dd($existingEmail);
                    if (!$existingEmail) {
                        $this->fncCrearEmailWeb($entidad_id, 'mail', $emailTypeKey, $emailToCheck);
                    }
                }
            }
            ///////////////////////////////////////////////
            // procesa y agrega los TELEFONOS a la entidad
            ///////////////////////////////////////////////
            for ($i = 1; $i <= 2; $i++) {
                // Cambia esto según la cantidad de teléfonos que esperas
                $phoneType = $row->{"Phone {$i} - Type"};
                $phoneValue = $row->{"Phone {$i} - Value"};

                // Verifica si se proporciona un tipo y un valor de teléfono
                if ($phoneType && $phoneValue && strlen($phoneValue) > 5) {
                    // Determina el tipo de teléfono basado en $phoneType
                    $phoneType = $this->determinarTipoIndice(config('constant.TIPO_TELEFONO'), $phoneType);

                    // Inserta el teléfono en la tabla 'telefonos'
                    // Telefono::insert([
                    //     'entidad_id' => $entidad_id, // El ID de la entidad a la que pertenece este teléfono
                    //     'tipo' => $phoneType,
                    //     'numero' => $phoneValue,
                    // ]);
                    $this->fncCrearTelefono($entidad_id, $phoneType, $phoneValue);
                }
            }

            ///////////////////////////////////////////////
            // procesa y agrega las DIRECCIONES a la entidad
            ///////////////////////////////////////////////
            for ($i = 1; $i <= 2; $i++) {
                // Cambia esto según la cantidad de direcciones que esperas
                // Determina el tipo de dirección basado en Address 1 - Type
                $addressType = $this->determinarTipoKey($i);
                // $formattedAddress = $row->{"Address {$i} - Formatted"};
                $street = $row->{"Address {$i} - Street"};
                if (!$street) {
                    continue;
                }
                $postalCode = $row->{"Address {$i} - Postal Code"};
                $city = $row->{"Address {$i} - City"};
                $ciudad_id = 0;
                $country = $row->{"Address {$i} - Country"};
                $pais_id = 0;

                if ($city == '') {
                    $city = 'Paris';
                }
                if ($country == '') {
                    $country = 'France';
                }
                // Realiza una consulta para buscar el país
                $pais = Pais::where('nombre', $country)->first();
                if (!$pais) {
                    // Inserta el pais si no existe
                    $pais_id = $this->fncCrearPais($country);
                } else {
                    $pais_id = $pais->id;
                }

                // Realiza una consulta para buscar la ciudad
                $ciudad = Ciudad::where('nombre', $city)->first();
                if (!$ciudad) {
                    // Inserta la ciudad si no existe
                    $ciudad_id = $this->fncCrearCiudad($city, $pais_id);
                } else {
                    $ciudad_id = $ciudad->id;
                }

                $this->fncCrearDireccion($entidad_id, $addressType, $street, $postalCode, $ciudad_id);
            }
        }
    }

    private function fncCrearEntidad($tipo, $razonSocial, $titulo, $nombres, $apellidos, $is_active, $aniversario, $sexo)
    {
        // Crea una nueva entidad
        $entidad = new Entidad();
        $entidad->razonSocial = $razonSocial;
        $entidad->titulo = $titulo;
        $entidad->nombres = $nombres;
        $entidad->apellidos = $apellidos;
        $entidad->aniversario = $aniversario;
        $entidad->is_active = $is_active;
        $entidad->sexo = $sexo;
        $entidad->tipo = $tipo;
        $entidad->save();
        return $entidad->id;
    }
    private function fncCrearTelefono($entidad_id, $tipo, $numero)
    {
        $telefono = new Telefono();
        $telefono->entidad_id = $entidad_id;
        $telefono->tipo = $tipo;
        $telefono->numero = $numero;
        $telefono->save();

        DB::table('entidad_telefonos')->insert([
            'entidad_id' => $entidad_id,
            'telefono_id' => $telefono->id,
        ]);
    }

    private function fncCrearEmailWeb($entidad_id, $tipo1 = 'mail', $tipo2 = 'personal', $valor)
    {
        $email = new Email();
        $email->entidad_id = $entidad_id;
        $email->tipo1 = $tipo1;
        $email->tipo2 = $tipo2;
        $email->nombre = strtolower($valor);
        $email->save();

        DB::table('entidad_emails')->insert([
            'entidad_id' => $entidad_id,
            'email_id' => $email->id,
        ]);
    }

    private function fncCrearDireccion($entidad_id, $tipo, $street, $postalCode, $ciudad_id)
    {
        $direccion = new Direccion();
        $direccion->entidad_id = $entidad_id;
        $direccion->tipo = $tipo;
        $direccion->ciudad_id = $ciudad_id;
        $direccion->direccion = $street;
        $direccion->codigo_postal = $postalCode;
        $direccion->save();

        DB::table('entidad_direcciones')->insert([
            'entidad_id' => $entidad_id,
            'direccion_id' => $direccion->id,
        ]);
    }

    private function fncCrearCiudad($nombre, $pais_id)
    {
        $ciudad = new Ciudad();
        $ciudad->nombre = $nombre;
        $ciudad->pais_id = $pais_id;
        $ciudad->save();
        return $ciudad->id;
    }

    private function fncCrearPais($nombre)
    {
        $pais = new Pais();
        $pais->nombre = $nombre;
        $pais->save();
        return $pais->id;
    }

    private function determinarTipoIndex($tabla, $key)
    {
        // Convierte a minúsculas para realizar una comparación insensible a mayúsculas/minúsculas
        $key = strtolower($key);
        $existe = null;
        $existe = Tabla::where('tabla', $tabla)
            ->Where('nombre', $key)
            ->first('tabla_id');
        return $existe;
    }

    private function determinarTipoKey($key)
    {
        if ($key == 1) {
            return 'personal';
        } elseif ($key == 2) {
            return 'trabajo';
        } elseif ($key == 3) {
            return 'otro';
        } else {
            // En caso de que no coincida con ninguno de ellos.
            return 'otro';
        }
    }

    private function determinarTipoIndice($key)
    {
        // Convierte a minúsculas para realizar una comparación insensible a mayúsculas/minúsculas
        $key = strtolower($key);

        // Verifica si contiene 'home' o 'work' y asigna el tipo adecuado
        if (strpos($key, 'home') !== false) {
            return 'personal';
        } elseif (strpos($key, 'work') !== false) {
            return 'trabajo';
        } elseif (strpos($key, 'mobile') !== false) {
            return 'otro';
        } else {
            // En caso de que no coincida con ninguno de los dos, podrías devolver un valor por defecto o manejarlo de otra manera.
            return 'otro';
        }
    }
    private function parseDate($date)
    {
        return $date ? Carbon::createFromFormat('Y-m-d', $date)->toDateString() : null;
    }
}
