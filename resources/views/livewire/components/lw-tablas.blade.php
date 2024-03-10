<div>
  <!-- resources/views/livewire/lista-component.blade.php -->
  <div>
    <button wire:click="borrarElemento(0)">-</button>
    <button wire:click="agregarElemento">+</button>
    <input type="text" wire:model="tab_nombre">
  </div>

  <div>
    <select id="listaDesplegable" wire:change="actualizarTabNombre" wire:model="selectedElemento">
      <option disabled value="">Seleccione...</option>
      @foreach ($tablas as $tabla)
        <option value="{{ $tabla['tab_id'] }}">{{ $tabla['tab_nombre'] }}</option>
      @endforeach
    </select>
  </div>
</div>
