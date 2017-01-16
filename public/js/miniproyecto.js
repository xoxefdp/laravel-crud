var campoNombres = $("input[name='nombres']");
var campoApellidos = $("input[name='apellidos']");
var campoCedula = $("input[name='cedula']");
var campoCorreo = $("input[name='correo']");
var campoTelefono = $("input[name='telefono']");

var buttonInsert = $("button[name='insert']");
var buttonUpdate = $("button[name='update']");

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(function() {
  $('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    getPersonas(url);
    window.history.pushState("", "", url);
  });

  campoCedula.on('keyup', function() {
    if ( validateNumericFormat( campoCedula.val() ) ) {
      verifyCedula( campoCedula.val() );
    }
  });

  campoCorreo.on('keyup', function() {
    if ( validateEmailFormat( campoCorreo.val() ) ) {
      verifyEmail( campoCorreo.val() );
    }
  });

  campoTelefono.on('keyup', function() {
    if ( validateNumericDashFormat( campoTelefono.val() ) ) {
      console.log('valid');
      buttonInsert.prop("disabled", false);
      // buttonUpdate.prop("disabled", false);
    } else {
      console.log('not valid');
      buttonInsert.prop("disabled", true);
      // buttonUpdate.prop("disabled", true);
    }
  });

});

function getPersonas(url) {
  $.ajax({
    url : url
  }).done(function(data) {
    $('.list').html(data);
  }).fail(function(){
    alert('Hubo un problema con la carga de personas.');
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

function verifyEmail(email) {
  $.ajax({
    data: {
      correo: email
    },
    dataType: 'JSON',
    method: 'POST',
    url: 'verify/email'
  }).done(function( data, textStatus, jqXHR ) {
    var response = $.parseJSON(data);
    if ( response ) {
      console.log(response);
      console.log('existe');
      buttonInsert.prop("disabled", true);
      // buttonUpdate.prop("disabled", true);
    } else {
      console.log(response);
      console.log('no existe');
      buttonInsert.prop("disabled", false);
      // buttonUpdate.prop("disabled", false);
    }
    console.log( 'data: '+data+' textStatus: '+textStatus+' jqXHR: '+jqXHR);
  }).fail(function( jqXHR, textStatus, errorThrown ) {
    console.log( 'jqXHR: '+jqXHR+' textStatus: '+textStatus+' errorThrown: '+errorThrown);
  });
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
    var response = $.parseJSON(data);
    if ( response ) {
      console.log('existe');
      buttonInsert.prop("disabled", true);
      // buttonUpdate.prop("disabled", true);
    } else {
      console.log('no existe');
      buttonInsert.prop("disabled", false);
      // buttonUpdate.prop("disabled", false);
    }
    console.log( 'data: '+data+' textStatus: '+textStatus+' jqXHR: '+jqXHR);
  }).fail(function( jqXHR, textStatus, errorThrown ) {
    console.log( 'jqXHR: '+jqXHR+' textStatus: '+textStatus+' errorThrown: '+errorThrown);
  });
}

function showInsert() {
  $.ajax({
    method: 'GET',
    url : 'persona/create'
  }).done(function( data, textStatus, jqXHR ) {
    $('.forms').html(data);
    // console.log( 'data: '+data+' textStatus: '+textStatus+' jqXHR: '+jqXHR);
  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga del formulario.');
    console.log( 'jqXHR: '+jqXHR+' textStatus: '+textStatus+' errorThrown: '+errorThrown);
  });
}

function showUpdate(id) {
  $.ajax({
    method: 'GET',
    url : 'persona/'+id+'/edit'
  }).done(function( data, textStatus, jqXHR ) {
    $('.forms').html(data);
    // console.log( 'data: '+data+' textStatus: '+textStatus+' jqXHR: '+jqXHR);
  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga del formulario.');
    console.log( 'jqXHR: '+jqXHR+' textStatus: '+textStatus+' errorThrown: '+errorThrown);
  });
}

function showErase(id) {
  $.ajax({
    method: 'GET',
    url : 'persona/'+id
  }).done(function( data, textStatus, jqXHR ) {
    $('.forms').html(data);
    // console.log( 'data: '+data+' textStatus: '+textStatus+' jqXHR: '+jqXHR);
  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga del formulario.');
    console.log( 'jqXHR: '+jqXHR+' textStatus: '+textStatus+' errorThrown: '+errorThrown);
  });
}

function toInsert() {
  var token = $('input[name=_token]').val();
  var campoNombres = $("input[name='nombres']");
  var campoApellidos = $("input[name='apellidos']");
  var campoCedula = $("input[name='cedula']");
  var campoCorreo = $("input[name='correo']");
  var campoTelefono = $("input[name='telefono']");

  $.ajax({
    data: {
      '_token': token,
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
    console.log( 'data: '+data+' textStatus: '+textStatus+' jqXHR: '+jqXHR);
  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga del formulario.');
    console.log( 'jqXHR: '+jqXHR+' textStatus: '+textStatus+' errorThrown: '+errorThrown);
  });
}

function toUpdate(id) {
  var token = $('input[name=_token]').val();
  var campoNombres = $("input[name='nombres']");
  var campoApellidos = $("input[name='apellidos']");
  var campoCedula = $("input[name='cedula']");
  var campoCorreo = $("input[name='correo']");
  var campoTelefono = $("input[name='telefono']");

  $.ajax({
    data: {
      '_token': token,
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
    console.log( 'data: '+data+' textStatus: '+textStatus+' jqXHR: '+jqXHR);
  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga del formulario.');
    console.log( 'jqXHR: '+jqXHR+' textStatus: '+textStatus+' errorThrown: '+errorThrown);
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
    console.log( 'data: '+data+' textStatus: '+textStatus+' jqXHR: '+jqXHR);
  }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert('Hubo un problema con la carga del formulario.');
    console.log( 'jqXHR: '+jqXHR+' textStatus: '+textStatus+' errorThrown: '+errorThrown);
  });
}
