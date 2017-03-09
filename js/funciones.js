var minScreenSize = 768;

$(document).ready(function() {


  /*Sets the input to validate depending on screen size*/
  if ($(window).width() > minScreenSize) {
    $("#usuario").prop('required', true);
    $("#password").prop('required', true);
  } else {
    $("#usuario-xs").prop('required', true);
    $("#password-xs").prop('required', true);
  }

  /*Sets the input to validate when size of the screen changes*/
  $(window).resize(function() {
    if ($(window).width() > minScreenSize) {
      $("#usuario").prop('required', true);
      $("#password").prop('required', true);
      $("#usuario-xs").prop('required', false);
      $("#password-xs").prop('required', false);
    } else {
      $("#usuario-xs").prop('required', true);
      $("#password-xs").prop('required', true);
      $("#usuario").prop('required', false);
      $("#password").prop('required', false);
    }
  });


  /*Load content depending on menu option selected*/
  $("#bodegas").on("click", function() {
    $("#contenido").html("");
    //$("#contenido").load("includes/bodegas.php"); //Borra el contenido
    $("#contenido").load("view/WarehouseView.php");
  });

  $("#proveedores").on("click", function() {
    $("#contenido").html("");
    //$("#contenido").load("includes/proveedores.php");
    $("#contenido").load("view/ProviderView.php");
  });

  $("#libs").on("click", function() {
    $("#contenido").html("");
    //$("#contenido").load("includes/librerias.php");
    $("#contenido").load("view/LibraryView.php");
  });

  $("#control-usuarios").on("click", function(e) {
    $("#contenido").html("");
    $("#contenido").load("view/UserView.php", function(){
      $("[data-toggle='toggle']").bootstrapToggle('destroy');
      $("[data-toggle='toggle']").bootstrapToggle();
    });
});

$("#entrada").on("click", function() {
  $("#contenido").html("");
  $("#contenido").load("includes/entrada.php");

});

$("#salida").on("click", function() {
  $("#contenido").html("");
  $("#contenido").load("includes/salida.php");

});

$("#inventario").on("click", function() {
  $("#contenido").html("");
  $("#contenido").load("view/ProductView.php");

});

/*Set fixed menu bar when scrolls page*/
$(document).on("scroll", function() {
  var scrollTop = $(document).scrollTop();
  var jumbotronSize = document.getElementById('my_jumbotron').offsetHeight;
  if (scrollTop > jumbotronSize) {
    //$('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top').addClass('transparent');
    $('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top').css('opacity', '0.9');
  } else {
    $('.navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top').css('opacity', '1');
  }
});


/*Click on float button to add user*/
$("#add-user").on("click", function() {

});

/* Show and Hide permissions options*/

$('#admin-option').on("click", function() {
  $(".custom-checkbox").css('display', 'none');
});

$('#normal-option').on("click", function() {
  $(".custom-checkbox").css('display', 'block');
});

$('#btn-create').submit(function(event) {
  event.preventDefault();
});

});
var valor = 0;

function barraProgreso() {
  $('.modal-content').hide();
  $('.modal-dialog').html('<div class="progress progress-striped active"> <div class="progress-bar role="progress-bar" aria-valuemin="0" aria-valuemax="100" style="width:0%"><span class="se-only"></span></div></div>');
  avanzandoBarra();
}

function avanzandoBarra() {
  valor = valor + 10;
  $('.progress-bar').css({
    'width': valor + '%'
  });
  if (valor == 200) {
    $('#myModal').modal('hide');
    location.reload();
  }
  setTimeout('avanzandoBarra()', 100);
}

/*Function to check the both passwords*/
function checkConfirmPassword(confirmInput) {
  var passwordUser = document.getElementById('password-user').value;
  if (passwordUser != confirmInput.value) {
    confirmInput.setCustomValidity("Las contraseñas deben coincidir");
  } else {
    confirmInput.setCustomValidity("");
  }
}
