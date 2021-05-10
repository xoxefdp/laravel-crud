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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/css/tether.min.css" integrity="sha512-hvQaBbuZeQnUD81rVYOVfLbiiGQ4poliFNaBhOk1BWrHKobIX/mxPe3oK+gEqzMNGKjs8hRxNWX/4E9RCf01eA==" crossorigin="anonymous" />
  <!-- <link rel="stylesheet" href="{{ asset('/assets/tether/dist/css/tether.min.css') }}" media="screen" title="no title" charset="utf-8"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="{{ asset('/assets/bootstrap/dist/css/bootstrap.min.css') }}" media="screen" title="no title" charset="utf-8"> -->
  @yield('custom-css')
</head>
<body>
  @yield('body')
  <footer>
    <p class="author-credits">Desarrollado por <a href="https://www.linkedin.com/in/josefranciscodiazperez" target="_blank">José Diaz</a></p>
    @yield('additional-footer')
  </footer>
  <!-- <script src="{{ asset('/assets/jquery/dist/jquery.min.js') }}"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- <script src="{{ asset('/assets/tether/dist/js/tether.min.js') }}"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js" integrity="sha512-X7kCKQJMwapt5FCOl2+ilyuHJp+6ISxFTVrx+nkrhgplZozodT9taV2GuGHxBgKKpOJZ4je77OuPooJg9FJLvw==" crossorigin="anonymous"></script>
  <!-- <script src="{{ asset('/assets/bootstrap/dist/js/bootstrap.min.js') }}"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  @yield('custom-js')
</body>
</html>
