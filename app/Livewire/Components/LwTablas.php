<?php
// app/Http/Livewire/Components/LwTablas.php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Backend\Tabla;

class LwTablas extends Component
{
    public $tablas = [];
    public $tab_nombre = '';
    public $selectedElemento = '';

    public function mount($tab_tabla = 0)
    {
        // Obtener datos de la base de datos y asignarlos a $this->tablas
        $this->tablas = $this->tab_tabla ? Tabla::where('tab_tabla', $this->tab_tabla)->get(['tab_id', 'tab_nombre']) : Tabla::all();
    }

    public function render()
    {
        return view('livewire.components.lw-tablas');
    }

    public function agregarElemento()
    {
        // Verificar si el elemento ya existe en la lista
        $existe = collect($this->tablas)->contains('tab_nombre', $this->tab_nombre);

        if (!$existe) {
            // Agregar el nuevo elemento a la lista
            $nuevoElemento = Tabla::create(['tab_nombre' => $this->tab_nombre]);
            $this->tablas->push(['tab_id' => $nuevoElemento->tab_id, 'tab_nombre' => $this->tab_nombre]);
            $this->tab_nombre = ''; // Limpiar el campo de texto después de agregar
        }
    }

    public function borrarElemento()
    {
        // Verificar si se ha seleccionado un elemento
        if ($this->selectedElemento) {
            // Borrar el elemento seleccionado
            Tabla::find($this->selectedElemento)->delete();
            // Obtener el índice del elemento seleccionado
            $index = collect($this->tablas)->search(function ($item) {
                return $item['tab_id'] == $this->selectedElemento;
            });
            // Eliminar el elemento de la colección por su índice
            if ($index !== false) {
                $this->tablas->forget($index);
            }
            $this->selectedElemento = ''; // Limpiar la selección después de eliminar
        }
    }

    public function actualizarTabNombre()
    {
        // Buscar el nombre correspondiente al tab_id seleccionado
        $tablaSeleccionada = collect($this->tablas)->firstWhere('tab_id', $this->selectedElemento);

        // Asignar el valor a $tab_nombre si se encuentra
        $this->tab_nombre = $tablaSeleccionada ? $tablaSeleccionada['tab_nombre'] : '';
    }
}
