@extends('main')

  @section('custom-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="José Diaz">
  @endsection {{-- custom-meta --}}

  @section('custom-title')
    <title>{{ $titulo }}</title>
  @endsection {{-- custom-title --}}

  @section('custom-css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" media="screen" title="no title" charset="utf-8">
  @endsection {{-- custom-css --}}

  @section('body')
    {{-- <h1>{{ $titulo }}</h1> --}}
    <section class="forms">
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
          <tr class="wrapperForms">
            @include('form-insert')
          </tr>
        </tbody>
      </table>
    </section>

    <section>
      <input type="hidden" name="validezCedula" value="false">
      <input type="hidden" name="validezCorreo" value="false">
      <input type="hidden" name="validezTelefono" value="false">
    </section>

    @if (count($personas) > 0)
      <section class="list">
          @include('list')
      </section>
    @endif

  @endsection {{-- body --}}

  @section('additional-footer')
  @endsection {{-- additional-footer --}}

  @section('custom-js')
    <script src="{{ asset('/js/crud-list.js') }}"></script>
    {{-- @include('scripts') --}}
  @endsection {{-- custom-js --}}
