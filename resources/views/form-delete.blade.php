<form name="formDelete" action="" method="POST">
  {{ method_field('DELETE') }}
  {{ csrf_field() }}
  <td class="id">{{ $persona->id }}</td>
  <td class="nombres"><input type="text" name="nombres" placeholder="NOMBRES" value="{{ $persona->nombres }}" disabled="disabled"></td>
  <td class="apellidos"><input type="text" name="apellidos" placeholder="APELLIDOS" value="{{ $persona->apellidos }}" disabled="disabled"></td>
  <td class="cedula"><input type="number" name="cedula" placeholder="CÉDULA" value="{{ $persona->cedula }}" disabled="disabled"></td>
  <td class="correo"><input type="email" name="correo" placeholder="CORREO" value="{{ $persona->correo }}" disabled="disabled"></td>
  <td class="telefono"><input type="tel" name="telefono" placeholder="TELÉFONO" value="{{ $persona->telefono }}" disabled="disabled"></td>
  <td class="operaciones">
    <div class="btn-group" role="group">
      <button class="btn button" type="button" name="cancel" onclick="showInsert()">cancelar</button>
      <button class="btn button erase" type="button" name="confirmErase" onclick="toErase( {{ $persona->id }} )">eliminar</button>
    </div>
  </td>
</form>
