<form name="formInsert" action="" method="POST">
  {{ csrf_field() }}
  <td class="id">&nbsp;</td>
  <td class="nombres"><input type="text" class="form-control" name="nombres" placeholder="NOMBRES" required="required"></td>
  <td class="apellidos"><input type="text" class="form-control" name="apellidos" placeholder="APELLIDOS" required="required"></td>
  <td class="cedula"><input type="number" class="form-control" name="cedula" placeholder="CÉDULA" required="required"></td>
  <td class="correo"><input type="email" class="form-control" name="correo" placeholder="CORREO" required="required"></td>
  <td class="telefono"><input type="tel" class="form-control" name="telefono" placeholder="TELÉFONO" required="required"></td>
  <td class="operaciones">
    <div class="btn-group" role="group">
      <button class="btn button" type="reset" name="reset">limpiar</button>
      <button class="btn button insert" type="button" name="confirmInsert" onclick="toInsert()">subir</button>
    </div>
  </td>
</form>
