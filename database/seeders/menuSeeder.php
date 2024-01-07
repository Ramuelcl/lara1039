<?php
// database/seeders/menuSeeder.php
namespace Database\Seeders;

use App\Models\backend\Menu;
use Illuminate\Database\Seeder;

class menuSeeder extends Seeder
{
    public $menu = 10000;
    public static $ind = 0;
    public static $saltoInd = 100;
    public static $ultimoInd;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createMenuItems(null);
    }

    public function createMenuItems($parentId, $subMenu = null)
    {
        if ($parentId === null) {
            // la primera vez que entra
            // carga menu si existe, si no, genera Inicio por defecto
            $menuItems = config('app_settings.menu', [
                'name' => __('Home'),
                'url' => '/',
                'icon' => 'home',
                'is_active' => true,
            ]);

            $menu = Menu::create([
                'name' => 'menu principal del sistema',
                'is_active' => false,
            ]);
        }

        $menuItems = $subMenu ?: $menuItems;
        dump($menuItems);
        $saltoInd = $subMenu ? 50 : 1000;

        foreach ($menuItems as $menuItem) {
            static::$ind += $saltoInd;

            $menu = Menu::create([
                'parent_id' => $parentId,
                'name' => $menuItem['name'],
                'url' => $menuItem['url'] ?? null,
                'icon' => $menuItem['icon'] ?? null,
                'is_active' => $menuItem['is_active'] ?? false,
                'vertical' => $menuItem['vertical'] ?? false,
            ]);

            // carga subMenu si existe, lectura recursiva
            if (isset($menuItem['submenu'])) {
                $this->createMenuItems($menu->id, $menuItem['submenu']);
                static::$ind = $menu->id;
            }
        }
    }
}
