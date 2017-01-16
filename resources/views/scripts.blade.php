<script type="text/javascript">

  var campoCedula = $("input[name='cedula']");
  var campoCorreo = $("input[name='correo']");
  var campoTelefono = $("input[name='telefono']");

  $(function(){
    $('body').on('click', '.pagination a', function(e){
      e.preventDefault();
      var url = $(this).attr('href');
      getPersonas(url);
      window.history.pushState("", "", url);
    });

    campoCedula.on('keyup', function(){
      if ( validateNumericFormat( campoCedula.val() ) ) {
        verifyCedula( campoCedula.val() );
      }
    });

    campoCorreo.on('keyup', function(){
      if ( validateEmailFormat( campoCorreo.val() ) ) {
        verifyEmail( campoCorreo.val() );
      }
    });

    campoTelefono.on('keyup', function(){
      if ( validateNumericFormat( campoTelefono.val() ) ) {
        console.log('valid');
        $("input[name='insert']").prop("disabled", false);
        // $("input[name='update']").prop("disabled", false);
      } else {
        console.log('not valid');
        $("input[name='insert']").prop("disabled", true);
        // $("input[name='update']").prop("disabled", true);
      }
    });
  });

  function getPersonas(url){
    $.ajax({
      url : url
    }).done(function(data){
      $('.list').html(data);
    }).fail(function(){
      alert('Hubo un problema con la carga de personas.');
    });
  }

  function validateEmailFormat(email){
    var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return emailRegex.test(email);
  }

  function validateNumericFormat(number){
    var numericRegex = /^\d+$/;
    return numericRegex.test(number);
  }

  function verifyEmail(email){
    $.ajax({
      async: false,
      data: {
        correo: email
      },
      dataType: 'JSON',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: 'POST',
      url:"{{url('/verify/email')}}",
    }).done(function( data, textStatus, jqXHR ) {
      var response = $.parseJSON(data);
      if ( response ) {
        console.log(response);
        console.log('existe');
        $("input[name='insert']").prop("disabled", true);
        // $("input[name='update']").prop("disabled", true);
      } else {
        console.log(response);
        console.log('no existe');
        $("input[name='insert']").prop("disabled", false);
        // $("input[name='update']").prop("disabled", false);
      }
      console.log( 'data: '+data+' textStatus: '+textStatus+' jqXHR: '+jqXHR);
    }).fail(function( jqXHR, textStatus, errorThrown ) {
      console.log( 'jqXHR: '+jqXHR+' textStatus: '+textStatus+' errorThrown: '+errorThrown);
    });
  }

  function verifyCedula(id){
    $.ajax({
      async: false,
      data: {
        cedula: id
      },
      dataType: 'JSON',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: 'POST',
      url:"{{url('/verify/cedula')}}",
    }).done(function( data, textStatus, jqXHR ) {
      var response = $.parseJSON(data);
      if ( response ) {
        console.log('existe');
        $("input[name='insert']").prop("disabled", true);
        // $("input[name='update']").prop("disabled", true);
      } else {
        console.log('no existe');
        $("input[name='insert']").prop("disabled", false);
        // $("input[name='update']").prop("disabled", false);
      }
      console.log( 'data: '+data+' textStatus: '+textStatus+' jqXHR: '+jqXHR);
    }).fail(function( jqXHR, textStatus, errorThrown ) {
      console.log( 'jqXHR: '+jqXHR+' textStatus: '+textStatus+' errorThrown: '+errorThrown);
    });
  }

  function sendInsert(){

  }

  function showUpdate(){

  }

  function sendUpdate(){

  }

</script>
