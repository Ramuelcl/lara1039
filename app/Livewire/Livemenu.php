<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\backend\Menu;

class Livemenu extends Component
{
    public $menus;
    public $selectedMenuId;
    public $orientation = false; // vertical=false; horizontal=true
    public $currentLocale;
    public $table = 'menus';

    public function render()
    {
        return view('livewire.livemenu');
    }

    public function mount($orientation = true)
    {
        $menus = Menu::where('id', '>', 1)
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->get()
            ->each(function ($menu) {
                if ($menu->url) {
                    $menu->url = strtolower($menu->url);
                    $menu->route = str_replace('/', '.', ltrim($menu->url, '/'));
                }
            })
            ->toArray();

        $this->menus = array_map(function ($menu) {
            $submenu = Menu::where('parent_id', $menu['id'])
                ->get()
                ->each(function ($menu) {
                    if ($menu->url) {
                        $menu->url = strtolower($menu->url);
                        $menu->route = str_replace('/', '.', ltrim($menu->url, '/'));
                    }
                })
                ->toArray();

            $menu['submenu'] = $submenu ?: false;

            unset($menu['created_at']);
            unset($menu['updated_at']);
            unset($menu['deleted_at']);

            return $menu;
        }, $menus);

        // dd($this->menus);
        $this->toggleOrientation($orientation);
    }

    public function toggleOrientation($orientation)
    {
        $this->orientation = $orientation;
    }

    public function is_activeMenu($url)
    {
        return request()->url() === url($url);
    }

    public function toggleSubMenu($menuId)
    {
        if ($this->selectedMenuId === $menuId) {
            $this->selectedMenuId = null;
        } else {
            $this->selectedMenuId = $menuId;
        }
    }
    public function openSubMenu($menuId)
    {
        $this->selectedMenuId = $menuId;
    }

    public function closeSubMenu()
    {
        $this->selectedMenuId = null;
    }

    public function selectLangue($langue = '/greeting/fr')
    {
        // dd($langue);
        $currentLocale = session('locale') === substr($langue, -2);
        return $currentLocale;
    }

    public function searchSubMenu($name)
    {
        $SubMenu = null;

        foreach ($this->menus as $menu) {
            if (isset($menu['name']) && $menu['name'] === $name && isset($menu['submenu'])) {
                $SubMenu = $menu['submenu'];
                break; // Si ya encontramos el submenu $name, salimos del bucle
            }
        }
        return $SubMenu;
    }
}
