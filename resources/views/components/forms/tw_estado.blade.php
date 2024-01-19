@props(['valor' => true, 'tipo' => 'si-no'])
@switch($tipo)
    @case('si-no')
        <div>
            {{ $valor ? 'Si' : 'No' }}
        </div>
    @break

    @case('yes-no')
        <div>
            {{ $valor ? 'Yes' : 'No' }}
        </div>
    @break

    @default
        Default case...
@endswitch
