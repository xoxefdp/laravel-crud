@php

  /**
   * [stringLimiter description]
   * @param  String $cadena    [description]
   * @param  int    $longitude [description]
   * @return [type]            [description]
   */
  function stringLimiter(String $cadena, int $longitude){
    $long_cadena = strlen($cadena);
    $salida = null;
    if ( $long_cadena > $longitude ) {
      $salida = '<span title="'.$cadena.'">'.substr($cadena,0,$longitude).'...'.'</span>';
    } else {
      $salida = $cadena;
    }
    return $salida;
  }

@endphp
<table class="table table-bordered table-striped table-hover table-responsive">
  <thead class="thead-inverse">
    <tr>
      <th class="id">id</th>
      <th class="nombres">nombres</th>
      <th class="apellidos">apellidos</th>
      <th class="cedula">cédula</th>
      <th class="correo">correo</th>
      <th class="telefono">telefono</th>
      <th class="operaciones">operaciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($personas as $persona)
    <tr listitem="{{ $persona->id }}">
      <td class="id">@php echo stringLimiter($persona->id, 11); @endphp</td>
      <td class="nombres">@php echo stringLimiter($persona->nombres, 11); @endphp</td>
      <td class="apellidos">@php echo stringLimiter($persona->apellidos, 11); @endphp</td>
      <td class="cedula">@php echo stringLimiter($persona->cedula, 11); @endphp</td>
      <td class="correo">@php echo stringLimiter($persona->correo, 11); @endphp</td>
      <td class="telefono">@php echo stringLimiter($persona->telefono, 11); @endphp</td>
      <td class="operaciones">
        <div class="btn-group" role="group">
          <button type="button" name="erase" class="btn button erase" onclick="showErase( {{ $persona->id }} )">eliminar</button>
          <button type="button" name="update" class="btn button update" onclick="showUpdate( {{ $persona->id }} )">modificar</button>
        </div>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<div class="container">
  <nav aria-label="">
    {{ $personas->links() }}
  </nav>
</div>
