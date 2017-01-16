<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  @yield('custom-meta')
  @yield('custom-title')
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <style type="text/css">
      .clearfix {
        zoom: 1;     /* triggers hasLayout */
        }  /* Only IE can see inside the conditional comment
        and read this CSS rule. Don't ever use a normal HTML
        comment inside the CC or it will close prematurely. */
    </style>
  <![endif]-->
  <link rel="stylesheet" href="{{ asset('/assets/bootstrap/dist/css/bootstrap.min.css') }}" media="screen" title="no title" charset="utf-8">
  @yield('custom-css')
</head>
<body>
  @yield('body')
  <footer>
    <p class="author-credits">Desarrollado por <a href="https://co.linkedin.com/in/josefranciscodiazperez">José Diaz</a></p>
    @yield('additional-footer')
  </footer>
  <script src="{{ asset('/assets/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  @yield('custom-js')
</body>
</html>
