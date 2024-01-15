 <div>
     componente de entidades{{ $paso }}

     @foreach ($entidades as $entidad)
         {{ $entidad->nombre }}
     @endforeach
 </div>
