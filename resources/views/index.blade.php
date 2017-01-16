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
      @include('form-insert')
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
    <script src="{{ asset('/js/miniproyecto.js') }}"></script>
    {{-- @include('scripts') --}}
  @endsection {{-- custom-js --}}
