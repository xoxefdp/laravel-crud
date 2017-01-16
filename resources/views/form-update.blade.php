<table>
  <thead>
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
    <tr>
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
            <button class="btn button update" type="button" name="update" onclick="toUpdate( {{ $persona->id }} )">actualizar</button>
          </div>
        </td>
      </form>
    </tr>
  </tbody>
</table>
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
