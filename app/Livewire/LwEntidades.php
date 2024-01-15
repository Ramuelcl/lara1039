<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\backend\Entidad;
class Lwentidades extends Component
{
    public $entidades = 0;
    public function render()
    {
        $this->entidades = Entidad::all();
        return view('livewire.lwentidades', compact(['entidades' => $this->entidades, 'paso' => 'rfrrr']));
    }
}
