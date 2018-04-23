function coincidirContrasena(int){
    if ($("#txt-password").val() == $("#txt-password2").val()){
        if($("#txt-password").val().length>5){
            $("#text-help"+int).html('Las contraseñas coinciden.');
            $("#text-help"+int).attr("style","color: green; font-size: 14px;");
           // $("#a-crear-cuenta").attr("href","loginCorreo.html");
        }else{
            $("#text-help"+int).html(' ');
        }
    } else{
        $("#text-help"+int).html("Las contraseñas no coinciden.");
      //  $("#a-crear-cuenta").removeAttr("href");
        $("#text-help"+int).attr("style","color: red; font-size: 14px;");
    }
}



$(document).ready(function(){
    $("#boton-busqueda").mousedown(function(e){
        if(e.which == 3)
        //1: izquierda, 2: medio/ruleta, 3: derecho
        {
            alert("Funciona el reconocimiento");
            //data-toggle="modal" data-target="#ModalBusqueda"
        }
    });
});



function validar(id){
    validarCampoVacio(id);        
}



var validarCampoVacio = function(id,numero){
    if (numero==null)
        numero="";
    if (id.value == ""){
        id.classList.remove('is-valid');
        id.classList.add('is-invalid');
        $('#text-help'+numero).html("Parametro invalido.");
        $('#text-help'+numero).addClass("invalid-feedback");
        $('#text-help'+numero).removeClass("valid-feedback");

    }
    else{
        id.classList.remove('is-invalid');
        id.classList.add('is-valid');
        $('#text-help'+numero).html("Parametro valido.");
        $('#text-help'+numero).addClass("valid-feedback");
        $('#text-help'+numero).removeClass("invalid-feedback");
    }
};



function validarElemento(id){
    if (id.value.length<1){
        /*document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');*/
        $('#text-help').html("Parametro invalido.");
        $('#text-help').addClass("invalid-feedback");
        $('#text-help').removeClass("valid-feedback");
    }
    
    else{
     /*   document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');*/
        $('#text-help').html("Parametro valido.");
        $('#text-help').addClass("valid-feedback");
        $('#text-help').removeClass("invalid-feedback");
    }
}


/*function textoValidar(id){
    if (!validarContrasena)
        $('#'+id).html("Texto invalido");
    else
        $('#'+id).html("Texto correcto");
};*/

function validarContrasena(etiqueta,numero){
    if (numero==null)
        numero="";
    if (etiqueta.value.length<6) {
        etiqueta.classList.remove("is-valid");
        etiqueta.classList.add("is-invalid");
        $('#text-help'+numero).html("La contraseña debe tener al menos 6 caracteres.");
        $('#text-help'+numero).removeClass("valid-feedback");
        $('#text-help'+numero).addClass("invalid-feedback");
    }
    else{
        etiqueta.classList.remove("is-invalid");
        etiqueta.classList.add("is-valid");
        $('#text-help'+numero).html("Contraseña valida.");
        $('#text-help'+numero).addClass("valid-feedback");
        $('#text-help'+numero).removeClass("invalid-feedback");
    }
}



function validarEmail(email,numero){
    if (numero==null)
        numero="";
    var patron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (patron.test(String(email.value).toLowerCase())){
        email.classList.remove("is-invalid");
        email.classList.add("is-valid");
        $('#text-help'+numero).addClass("valid-feedback");
        $('#text-help'+numero).removeClass("invalid-feedback");
        $('#text-help'+numero).html("Correo valido.");
    }
    else{
        email.classList.remove("is-valid");
        email.classList.add("is-invalid");
        $('#text-help'+numero).addClass("invalid-feedback");
        $('#text-help'+numero).removeClass("valid-feedback");
        $('#text-help'+numero).html("Correo invalido.");
    }
}



function JSONCorreo(){
    if(camposVacios(1)){
        alert("Uno o varios campos invalidos, por favor intente de nuevo.");
    }else{
        $.ajax({
            url:"ajax/procesarCorreo.php",
            method: "GET",
            data: "correo="+$("#exampleInputEmail1").val(),
            dataType: "json",
            success: function(respuesta){
                alert("funciona el success");            
            },
            error: function(respuesa){
                alert("Falta respuesta del servidor");
            }
        });
    }
}



function JSONCorreoAdministrador(){
    if(camposVacios(5)){
        alert("Uno o varios campos invalidos, por favor intente de nuevo.");
    }else{
        $.ajax({
            url:"ajax/procesarCorreo.php",
            method: "GET",
            data: "correo="+$("#exampleInputEmail1").val(),
            dataType: "json",
            success: function(respuesta){
                alert("funciona el success");            
            },
            error: function(respuesa){
                alert("Falta respuesta del servidor");
            }
        });
    }
}



function JSONContrasena(){
    if(camposVacios(2)){
        alert("Uno o varios campos invalidos, por favor intente de nuevo.");
    }else{
        $.ajax({
            url:"ajax/procesarContrasena.php",
            method: "GET",
            data: "contrasena="+$("#txt-contrasena").val(),
            dataType: "json",
            success: function(respuesta){
                alert("funciona el success para la contrasena");            
            },
            error: function(respuesa){
                alert("Falta respuesta del servidor");
            }
        });
    }
}



function JSONRegistro(){
    if(camposVacios(4)){
        alert("Uno o varios campos invalidos, por favor intente de nuevo.");
    }else{
        var parametros = "nombre="+$("#txt-nombre").val()+"&apellido="+$("#txt-apellido").val()+"&email="+$("#txt-email").val()+"&contraseña1="+$("#txt-password").val()+"&contraseña2="+$("#txt-password2").val()+"&respuesta="+$("#txt-respuesta-registro").val();
        $.ajax({
            url:"ajax/procesarRegistro.php",
            method: "GET",
            data: parametros ,
            dataType: "json",
            success: function(respuesta){
                alert("funciona el success para la contrasena");            
            },
            error: function(respuesa){
                alert("Falta respuesta del servidor");
            }
        });
    }
}



function JSONRegistroAdministrador(){
    if(camposVacios(6)){
        alert("Uno o varios campos invalidos, por favor intente de nuevo.");
    }else{}
    var parametros = "nombre="+$("#txt-nombre").val()+"&apellido="+$("#txt-apellido").val()+"&email="+$("#txt-email").val()+"&contraseña1="+$("#txt-password").val()+"&contraseña2="+$("#txt-password2").val()+"&respuesta="+$("#txt-respuesta").val();
    $.ajax({
        url:"ajax/procesarRegistroAdministrador.php",
        method: "GET",
        data: parametros ,
        dataType: "json",
        success: function(respuesta){
            alert("funciona el success para la contrasena");            
        },
        error: function(respuesa){
            alert("Falta respuesta del servidor");
        }
    });
}



function JSONRespaldo(){
    if(camposVacios(3)){
        alert("Uno o varios campos invalidos, por favor intente de nuevo.");
    }else{
        $.ajax({
            url: "ajax/procesarRespaldo.php",
            method: "GET",
            data: "respuesta="+$("#txt-respuesta").val(),
            dataType: "json",
            success: function(respuesta){
                alert("funciona el success");
            },
            error: function(respuesta){
                alert("Falta respuesta del servidor");
            }
        });        
    }
} 



function camposVacios(int){
    if(int==1 || int==5){
        if($("#exampleInputEmail1").val() == "" || $("#text-help").html() == "Correo invalido.") {
            return true;
        } else{
            $("#abtn-siguiente").attr("href","loginPassword.html");
            return false;
        }
    } else if(int==2){
        if($("#txt-contrasena").val() == "" || $("#text-help").html() == "La contraseña debe tener al menos 6 caracteres.") {
            return true;
        } else{
            $("#abtn-siguiente").attr("href","pagina-principal.html");
            return false;
        }
    } else if(int==3){
        if($("#txt-respuesta").val() == "") {
            return true;
        } else{
            $("#abtn-siguiente").attr("href","pagina-principal.html");
            return false;
        }
    } else if(int==4 || int==6){
        if($("#txt-nombre").val() == "" || $("#txt-apellido").val() == "" || $("#txt-email").val() == "" || $("#txt-password2").val() == "" || $("#txt-respuesta-registro").val() == "" || $("#text-help").html() == "Correo invalido." || $("#text-help1").html() == "Parametro invalido." || $("#text-help2").html() == "Parametro invalido." || $("#text-help").html() == "Correo invalido." || $("#text-help4").html() == "La contraseña debe tener al menos 6 caracteres." || $("#text-help5").html() == "La contraseña debe tener al menos 6 caracteres." || $("#text-help6").html() == "Las contraseñas no coinciden." ) {
            return true;
        } else{
            $("#a-crear-cuenta").attr("href","loginCorreo.html");
            return false;
        }
    } 
}



$(document).ready(function(){
    $("#icono-usuario").html("Q");
});



function acortarNombres(id){
    if(id.value.length > 13){
        var temp = id[10];
        $("#"+id).html(temp+"...");
    }
}
/*
$(document).ready(function(){
//    var div = document.getElementById('form');
    $('#form').addClass('animacionRebote');
});*/
