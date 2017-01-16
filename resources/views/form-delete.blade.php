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
      <td class="id">{{ $persona->id }}</td>
      <td class="nombres">{{ $persona->nombres }}</td>
      <td class="apellidos">{{ $persona->apellidos }}</td>
      <td class="cedula">{{ $persona->cedula }}</td>
      <td class="correo">{{ $persona->correo }}</td>
      <td class="telefono">{{ $persona->telefono }}</td>
      <td class="operaciones">
        <div class="btn-group" role="group">
          <button class="btn button" type="button" name="cancel" onclick="showInsert()">cancelar</button>
          <button class="btn button erase" type="button" name="erase" onclick="toErase( {{ $persona->id }} )">eliminar</button>
        </div>
      </td>
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
