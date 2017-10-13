var campoNombres = $("input[name='nombres']");
var campoApellidos = $("input[name='apellidos']");
var campoCedula = $("input[name='cedula']");
var campoCorreo = $("input[name='correo']");
var campoTelefono = $("input[name='telefono']");

var buttonInsert = $("button[name='confirmInsert']");

var validezCedula = $("input[name='validezCedula']");
var validezCorreo = $("input[name='validezCorreo']");
var validezTelefono = $("input[name='validezTelefono']");

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('body').on('click', '.pagination a', function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  getPersonas(url);
  window.history.pushState("", "", url);
});

campoCedula.on('keyup', function() {
  if ( validateNumericFormat( campoCedula.val() ) ) {
    verifyCedula( campoCedula.val() );
    // console.log('validateNumericFormat true');
  } else {
    validezCedula.val('false');
    console.log('validateNumericFormat false');
  }
});

campoCorreo.on('keyup', function() {
  if ( validateEmailFormat( campoCorreo.val() ) ) {
    verifyEmail( campoCorreo.val() );
    // console.log('validateEmailFormat true');
  } else {
    validezCorreo.val('false');
    console.log('validateEmailFormat false');
  }
});

campoTelefono.on('keyup', function() {
  if ( validateNumericDashFormat( campoTelefono.val() ) ) {
    validezTelefono.val('true');
    // console.log('validateNumericDashFormat true');
  } else {
    validezTelefono.val('false');
    console.log('validateNumericDashFormat false');
  }
});


validezCedula.change( function(){
  // console.log('validezCedula change');
});
validezCorreo.change( function(){
  // console.log('validezCorreo change');
});
validezTelefono.change( function(){
  // console.log('validezTelefono change');
});

function getPersonas(url) {
  $.ajax({
    url : url
  }).done(function( data, textStatus, jqXHR ) {
    $('.list').html(data);
    // console.log(data);
    // console.log(textStatus);
    // console.log(jqXHR);

    stylePagination();

  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga de personas.');
    console.log(jqXHR);
    console.log(textStatus);
    console.log(errorThrown);
  });
}

function validateNumericFormat(number) {
  var numericRegex = /^\d+$/;
  return numericRegex.test(number);
}

function validateEmailFormat(email) {
  var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return emailRegex.test(email);
}

function validateNumericDashFormat(numberDash) {
  var numericDashRegex = /^[0-9 ]+$/;
  return numericDashRegex.test(numberDash);
}

function verifyCedula(id) {
  $.ajax({
    data: {
      cedula: id
    },
    dataType: 'JSON',
    method: 'POST',
    url: 'verify/cedula'
  }).done(function( data, textStatus, jqXHR ) {
    if ( $.parseJSON(data) ) {
      validezCedula.val('false');
      console.log('verifyCedula false');
    } else {
      validezCedula.val('true');
      console.log('verifyCedula true');
    }
    // console.log(data);
    // console.log(textStatus);
    // console.log(jqXHR);

  }).fail(function( jqXHR, textStatus, errorThrown ) {
    // console.log(jqXHR);
    // console.log(textStatus);
    // console.log(errorThrown);
  });
}

function verifyEmail(email) {
  $.ajax({
    data: {
      correo: email
    },
    dataType: 'JSON',
    method: 'POST',
    url: 'verify/email'
  }).done(function( data, textStatus, jqXHR ) {
    if ( $.parseJSON(data) ) {
      validezCorreo.val('false');
      console.log('verifyEmail false');
    } else {
      validezCorreo.val('true');
      console.log('verifyEmail true');
    }
    // console.log(data);
    // console.log(textStatus);
    // console.log(jqXHR);

  }).fail(function( jqXHR, textStatus, errorThrown ) {
    // console.log(jqXHR);
    // console.log(textStatus);
    // console.log(errorThrown);
  });
}

function showInsert() {
  $.ajax({
    method: 'GET',
    url : 'persona/create'
  }).done(function( data, textStatus, jqXHR ) {
    $('.wrapperForms').html(data);
    // console.log(data);
    // console.log(textStatus);
    // console.log(jqXHR);

  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga del formulario.');
    console.log(jqXHR);
    console.log(textStatus);
    console.log(errorThrown);
  });
}

function showUpdate(id) {
  $.ajax({
    method: 'GET',
    url : 'persona/'+id+'/edit'
  }).done(function( data, textStatus, jqXHR ) {
    $('.wrapperForms').html(data);
    // console.log(data);
    // console.log(textStatus);
    // console.log(jqXHR);

  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga del formulario.');
    console.log(jqXHR);
    console.log(textStatus);
    console.log(errorThrown);
  });
}

function showErase(id) {
  $.ajax({
    method: 'GET',
    url : 'persona/'+id
  }).done(function( data, textStatus, jqXHR ) {
    $('.wrapperForms').html(data);
    // console.log(data);
    // console.log(textStatus);
    // console.log(jqXHR);

  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga del formulario.');
    console.log(jqXHR);
    console.log(textStatus);
    console.log(errorThrown);
  });
}

function toInsert() {
  var campoNombres = $("input[name='nombres']");
  var campoApellidos = $("input[name='apellidos']");
  var campoCedula = $("input[name='cedula']");
  var campoCorreo = $("input[name='correo']");
  var campoTelefono = $("input[name='telefono']");
  $.ajax({
    data: {
      'nombres': campoNombres.val(),
      'apellidos': campoApellidos.val(),
      'cedula': campoCedula.val(),
      'correo': campoCorreo.val(),
      'telefono': campoTelefono.val(),
    },
    dataType: 'JSON',
    method: 'POST',
    url : 'persona'
  }).done(function( data, textStatus, jqXHR ) {
    $('tbody').append('<tr listitem="'+data.id+'"><td>'+data.id+'</td><td>'+data.nombres+'</td><td>'+data.apellidos+'</td><td>'+data.cedula+'</td><td>'+data.correo+'</td><td>'+data.telefono+'</td><td><div class="btn-group" role="group"><button type="button" name="erase" class="btn button erase" onclick="showErase( '+data.id+' )">eliminar</button><button type="button" name="update" class="btn button update" onclick="showUpdate( '+data.id+' )">modificar</button></div></td></tr>');
    showInsert();
    // console.log(data);
    // console.log(textStatus);
    // console.log(jqXHR);

  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga del formulario.');
    console.log(jqXHR);
    console.log(textStatus);
    console.log(errorThrown);
  });
}

function toUpdate(id) {
  var campoNombres = $("input[name='nombres']");
  var campoApellidos = $("input[name='apellidos']");
  var campoCedula = $("input[name='cedula']");
  var campoCorreo = $("input[name='correo']");
  var campoTelefono = $("input[name='telefono']");
  $.ajax({
    data: {
      'nombres': campoNombres.val(),
      'apellidos': campoApellidos.val(),
      'cedula': campoCedula.val(),
      'correo': campoCorreo.val(),
      'telefono': campoTelefono.val(),
    },
    dataType: 'JSON',
    method: 'PUT',
    url : 'persona/'+id
  }).done(function( data, textStatus, jqXHR ) {
    $("tr[listitem='"+data.id+"']").html('<td>'+data.id+'</td><td>'+data.nombres+'</td><td>'+data.apellidos+'</td><td>'+data.cedula+'</td><td>'+data.correo+'</td><td>'+data.telefono+'</td><td><div class="btn-group" role="group"><button type="button" name="erase" class="btn button erase" onclick="showErase( '+data.id+' )">eliminar</button><button type="button" name="update" class="btn button update" onclick="showUpdate( '+data.id+' )">modificar</button></div></td>');
    showInsert();
    // console.log(data);
    // console.log(textStatus);
    // console.log(jqXHR);

  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga del formulario.');
    console.log(jqXHR);
    console.log(textStatus);
    console.log(errorThrown);
  });
}

function toErase(id) {
  $.ajax({
    dataType: 'JSON',
    method: 'DELETE',
    url : 'persona/'+id
  }).done(function( data, textStatus, jqXHR ) {
    $("tr[listitem='"+data.id+"']").remove();
    showInsert();
    // console.log(data);
    // console.log(textStatus);
    // console.log(jqXHR);

  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga del formulario.');
    console.log(jqXHR);
    console.log(textStatus);
    console.log(errorThrown);
  });
}

function stylePagination() {
  $('.list .container nav').children().children().addClass('page-item');
  $('.list .container nav').children().children().children().addClass('page-link');
}

$(window).on('load', function(){
  stylePagination();
});
