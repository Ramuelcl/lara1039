<?php
// database/seeders/CategoriaSeeder.php
namespace Database\Seeders;

use App\Models\backend\Tabla;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public $categoria = 3000;
    public $niveles = 2;
    public static $ind = 0;
    public static $saltoInd = 10;
    public static $ultimoInd;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->categoria = config('app_settings.codigo_categorias', 3000);
        $this->niveles = config('app_settings.niveles_categorias', 2);
        $this->createCategoriaItems(null);
    }

    public function createCategoriaItems($parentId, $subCategoria = null)
    {
        if ($parentId === null) {
            $Items = config('app_settings.categorias', [
                'tab_id' => static::$ind,
                'tab_nombre' => 'Categoría ' . static::$ind + 1,
                'is_active' => true,
                'subcategoria' => [
                    'tab_id' => static::$ind + 1,
                    'tab_nombre' => 'Categoría ' . static::$ind + 2,
                    'is_active' => true,
                    'subcategoria' => [
                        'tab_id' => static::$ind + 2,
                        'tab_nombre' => 'Categoría ' . static::$ind + 3,
                        'is_active' => true,
                    ],
                ],
            ]);

            $categoria = Tabla::create([
                'tab_tabla' => $this->categoria,
                'tab_id' => static::$ind,
                'tab_nombre' => 'categorias',
                'is_active' => false,
            ]);
        }
        // dd($Items, $categoria);

        $Items = $subCategoria ?: $Items;
        $saltoInd = $subCategoria ? 5 : 100;

        // dd($Items);

        foreach ($Items as $Item) {
            static::$ind += $saltoInd;
            $categoria = Tabla::create([
                'tab_tabla' => $this->categoria,
                'tab_id' => $Item['id'] ?? static::$ind,
                'tab_nombre' => $Item['nombre'],
                'is_active' => $Item['is_active'] ?? false,
                'tab_tipoValor' => 'integer',
                'tab_valor1' => $parentId,
            ]);

            // dump(static::$ind, $categoria);

            // carga subCategoria si existe, lectura recursiva
            if (isset($Item['subcategoria'])) {
                $this->createCategoriaItems($categoria->tab_id, $Item['subcategoria']);
                static::$ind = $categoria->tab_id;
            }
        }
    }
}
