<form name="formInsert" action="" method="POST">
  {{ csrf_field() }}
  <td class="id">&nbsp;</td>
  <td class="nombres"><input type="text" name="nombres" placeholder="NOMBRES" required="required"></td>
  <td class="apellidos"><input type="text" name="apellidos" placeholder="APELLIDOS" required="required"></td>
  <td class="cedula"><input type="number" name="cedula" placeholder="CÉDULA" required="required"></td>
  <td class="correo"><input type="email" name="correo" placeholder="CORREO" required="required"></td>
  <td class="telefono"><input type="tel" name="telefono" placeholder="TELÉFONO" required="required"></td>
  <td class="operaciones">
    <div class="btn-group" role="group">
      <button class="btn button" type="reset" name="reset">limpiar</button>
      <button class="btn button insert" type="button" name="confirmInsert" onclick="toInsert()">subir</button>
    </div>
  </td>
</form>
