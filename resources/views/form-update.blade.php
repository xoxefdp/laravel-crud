<form name="formUpdate" action="" method="POST">
  {{ method_field('PUT') }}
  {{ csrf_field() }}
  <td class="id">{{ $persona->id }}</td>
  <td class="nombres"><input type="text" name="nombres" placeholder="NOMBRES" value="{{ $persona->nombres }}" required="required"></td>
  <td class="apellidos"><input type="text" name="apellidos" placeholder="APELLIDOS" value="{{ $persona->apellidos }}" required="required"></td>
  <td class="cedula"><input type="number" name="cedula" placeholder="CÉDULA" value="{{ $persona->cedula }}" required="required"></td>
  <td class="correo"><input type="email" name="correo" placeholder="CORREO" value="{{ $persona->correo }}" required="required"></td>
  <td class="telefono"><input type="tel" name="telefono" placeholder="TELÉFONO" value="{{ $persona->telefono }}" required="required"></td>
  <td class="operaciones">
    <div class="btn-group" role="group">
      <button class="btn button" type="button" name="cancel" onclick="showInsert()">cancelar</button>
      <button class="btn button update" type="button" name="confirmUpdate" onclick="toUpdate( {{ $persona->id }} )">actualizar</button>
    </div>
  </td>
</form>
