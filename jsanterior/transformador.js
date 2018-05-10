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



function camposVacios(int){
    if(int==1 || int==5){
        if($("#exampleInputEmail1").val() == "" || $("#text-help").html() == "Correo invalido.") {
            return true;
        } else{
            //$("#abtn-siguiente").attr("href","loginPassword.html");
            return false;
        }
    } else if(int==2){
        if($("#txt-contrasena").val() == "" || $("#text-help").html() == "La contraseña debe tener al menos 6 caracteres.") {
            return true;
        } else{
            //$("#abtn-siguiente").attr("href","pagina-principal.html");
            return false;
        }
    } else if(int==3){
        if($("#txt-respuesta").val() == "") {
            return true;
        } else{
            //$("#abtn-siguiente").attr("href","pagina-principal.html");
            return false;
        }
    } else if(int==4 || int==6){
        if($("#txt-nombre").val() == "" || $("#txt-apellido").val() == "" || $("#txt-email").val() == "" || $("#txt-password2").val() == "" || $("#txt-respuesta-registro").val() == "" || $("#text-help").html() == "Correo invalido." || $("#text-help1").html() == "Parametro invalido." || $("#text-help2").html() == "Parametro invalido." || $("#text-help").html() == "Correo invalido." || $("#text-help4").html() == "La contraseña debe tener al menos 6 caracteres." || $("#text-help5").html() == "La contraseña debe tener al menos 6 caracteres." || $("#text-help6").html() == "Las contraseñas no coinciden." ) {
            return true;
        } else{
            //$("#a-crear-cuenta").attr("href","loginCorreo.html");
            return false;
        }
    } 
}



function JSONCorreo(){
    if(camposVacios(1)){
        alert("Uno o varios campos invalidos, por favor intente de nuevo.");
    }else{
        $.ajax({
            url:'ajax/funciones.php?accion=procesarCorreo',
            data: 'correo='+$("#exampleInputEmail1").val()+'&tipo=2',
            method: 'GET',
            dataType: "json",
            success: function(respuesta){
                console.log(respuesta);
                if(respuesta.valor == 1){
                    localStorage.setItem('correo', $("#exampleInputEmail1").val());
                    localStorage.setItem('nombre', respuesta.sql.nombre);
                    localStorage.setItem('apellido', respuesta.sql.apellido);
                    localStorage.setItem('carpeta',respuesta.sql.carpeta);
                    localStorage.setItem('ruta',respuesta.sql.ruta);
                    localStorage.setItem('rutaActual',respuesta.sql.ruta);
                    localStorage.setItem('tipo',respuesta.sql.tipo);
                    window.location='loginPassword.html';
                }else{
                    alert('Este usuario no existe.');
                }
            },
            error: function(error){
                console.log(error);
                alert("Falta respuesta del servidor 3443344");
            }
        });
    }
}



function JSONCorreoAdministrador(){
    if(camposVacios(5)){
        alert("Uno o varios campos invalidos, por favor intente de nuevo.");
    }else{
        $.ajax({
            url:"ajax/funciones.php?accion=procesarCorreo",
            method: "GET",
            data: "correo="+$("#exampleInputEmail1").val()+'&tipo=1',
            dataType: "json",
            success: function(respuesta){
                console.log(respuesta);
                if(respuesta.valor == 1){
                    $('correo-ingresado').html('hola mundo ');
                    localStorage.setItem('correo', $("#exampleInputEmail1").val());
                    localStorage.setItem('nombre', respuesta.sql.nombre);
                    localStorage.setItem('apellido', respuesta.sql.apellido);
                    localStorage.setItem('carpeta',respuesta.sql.carpeta);
                    localStorage.setItem('ruta',respuesta.sql.ruta);
                    localStorage.setItem('rutaActual',respuesta.sql.ruta);
                    localStorage.setItem('tipo',respuesta.sql.tipo);
                    window.location='loginPassword.html';
                }else{
                    alert('Este usuario no existe.');
                }            
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
            url:"ajax/funciones.php?accion=procesarContrasena",
            method: "GET",
            data: "contrasena="+$("#txt-contrasena").val()+"&correo="+localStorage.getItem('correo'),
            dataType: "json",
            success: function(respuesta){
                console.log(respuesta);          
                if(respuesta.valor == 1){
                    window.location = 'pagina-principal.html';
                }else{
                    alert('contraseña invalida');
                }
            },
            error: function(error){
                console.log(error);
                alert("Falta respuesta del servidor");
            }
        });
    }
}



function JSONRegistro(){
    if(camposVacios(4)){
        alert("Uno o varios campos invalidos, por favor intente de nuevo.");
    }else{
        var parametros = "nombre="+$("#txt-nombre").val()+"&apellido="+$("#txt-apellido").val()+"&email="+$("#txt-email").val()+"&contrasena1="+$("#txt-password").val()+"&contrasena2="+$("#txt-password2").val()+"&respuesta="+$("#txt-respuesta-registro").val()+"&tipo=2";
        $.ajax({
            url:"ajax/funciones.php?accion=procesarRegistro",
            method: "GET",
            data: parametros,
            dataType: "json",
            success: function(respuesta){
                console.log(respuesta);            
                if(respuesta.valor == 1){
                    alert('Cuenta creada con exito!');
                    window.location = 'loginCorreo.html';
                }else{
                    alert('contraseña invalida');
                }
            },
            error: function(error){
                console.log(error);
                alert("Falta respuesta del servidor");
            }
        });
    }
}



function JSONRegistroAdministrador(){
    if(camposVacios(6)){
        alert("Uno o varios campos invalidos, por favor intente de nuevo.");
    }else{
        var parametros = "nombre="+$("#txt-nombre").val()+"&apellido="+$("#txt-apellido").val()+"&email="+$("#txt-email").val()+"&contrasena1="+$("#txt-password").val()+"&contrasena2="+$("#txt-password2").val()+"&respuesta="+$("#txt-respuesta").val()+"&tipo=1";
        $.ajax({
            url:"ajax/funciones.php?accion=procesarRegistro",
            method: "GET",
            data: parametros ,
            dataType: "json",
            success: function(respuesta){
                console.log(respuesta);
                if(respuesta.valor == 1){
                    alert('Cuenta creada con exito!');
                    window.location = 'loginCorreo.html';
                }else{
                    alert('contraseña invalida');
                }
            },
            error: function(error){
                console.log(error);
                alert("Falta respuesta del servidor");
            }
        });
    }
}



function JSONRespaldo(){
    if(camposVacios(3)){
        alert("Uno o varios campos invalidos, por favor intente de nuevo.");
    }else{
        $.ajax({
            url: "ajax/funciones.php?accion=procesarRespaldo",
            method: "GET",
            data: "respuesta="+$("#txt-respuesta").val()+"&correo="+localStorage.getItem('correo'),
            dataType: "json",
            success: function(respuesta){
                if(respuesta.valor == 1){
                    alert('tu contraseña es: "'+respuesta.sql.contrasena+'" trata de no olvidarla de nuevo.');
                    window.location='pagina-principal.html';
                }else{
                    alert('No es la respuesta correcta');
                }
            },
            error: function(respuesta){
                alert("Falta respuesta del servidor");
            }
        });        
    }
} 




$(document).ready(function(){
    $("#icono-usuario").html(localStorage.getItem('nombre')[0]);
    if(localStorage.getItem('tipo') == 1){
        $('#icono-usuario').css('background-color','gold');
    }else{
        $('#icono-usuario').css('background-color','blue');
    }
});



function acortarNombres(id){
    if(id.length > 13){
        var temp = id.substr(0,13);
        return temp+'...';
    }else{
        return id;
    }
}



function acortarRuta(id){
    if(id.length > 90){
        var temp = id.substr(0,90);
        return temp+'...';
    }else{
        return id;
    }
}



$(document).ready(function(){
    localStorage.setItem('rutaActual',localStorage.getItem('ruta'));
    $.ajax({
        url: 'ajax/funciones.php?accion=mostrarArchivos',
        method: 'GET',
        data: 'ruta='+localStorage.getItem('ruta')+"&tipo="+localStorage.getItem('tipo'),
        dataType: 'json',
        success: function(respuesta){
            //console.log(respuesta);
            //console.log(respuesta.carpetas.length);
            if(respuesta.carpetas.length==0){
                $('#row-carpetas').append('<div id="sin-carpetas" class="tipo-objeto" >No hay carpetas.</div>');
            }else{
                $('#sin-carpetas').remove();
                $('#row-carpetas').html('');
            }
            for(var i=0; i<respuesta.carpetas.length; i++){
                //console.log(respuesta.carpetas[i]);
                $('#row-carpetas').append('<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">'+
                '<div class="carpeta" oncontextmenu="return showContextMenux(event);" onclick="nuevaRuta(\''+respuesta.carpetas[i]+'\')">'+
                    '&nbsp;'+
                    '<i class="fas fa-folder"></i>'+
                    '&nbsp;&nbsp;&nbsp;'+acortarNombres(respuesta.carpetas[i])+
                '</div>'+
                '</div>');
            }
        },
        error: function(error){
            console.log(error);
        }
    });
});



$(document).ready(function(){
    localStorage.setItem('rutaActual', localStorage.getItem('ruta'));
    $.ajax({
        url: 'ajax/funciones.php?accion=mostrarArchivos',
        method: 'GET',
        data: 'ruta='+localStorage.getItem('ruta')+"&tipo="+localStorage.getItem('tipo'),
        dataType: 'json',
        success: function(respuesta){
            //console.log("dasdasdasdasdasdasd");
            //console.log(respuesta);
            //console.log(respuesta.archivos.length);
            if(respuesta.archivos.length==0){
                $('#row-archivos').append('<div id="sin-archivos" class="tipo-objeto">No hay archivos.</div>');
            }else{
                $('#sin-archivos').remove();
                $('#row-archivos').html('');
            }
            for(var i=0; i<respuesta.archivos.length; i++){
                //console.log(respuesta.archivos[i]);
                $('#row-archivos').append('<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">'+
                '<div class="carpeta-archivo" oncontextmenu="descargar(\''+respuesta.archivos[i]+'\');return showContextMenux(event);">'+
                    '<div class="div-imagen" id="div-imagen'+i+'">'+
                        /*'<img class="imagen" id="imagen-archivo'+i+'"></img>'+*/
                        '<i class="icono-archivo'+i+'" style="font-size: 94px; padding-top: 4px;"></i>'+
                    '</div>'+
                        '<div class="pie-imagen">'+
                            '<i class="icono-archivo'+i+'" style="margin-left: 8px;"></i>'+
                            '<div class="nombre-archivo" id="nombre-archivo'+i+'" acortarNombres(this)>'+acortarNombres(respuesta.archivos[i])+'</div>'+
                        '</div>'+
                    '</div>'+
                '</div>');
                tipo(respuesta.archivos[i],i);
            }
        },
        error: function(error){
            console.log(error);
        }
    });
});



function cargarCarpetas(ruta){
    $.ajax({
        url: 'ajax/funciones.php?accion=mostrarArchivos',
        method: 'GET',
        data: 'ruta='+localStorage.getItem('rutaActual')+"&tipo="+localStorage.getItem('tipo'),
        dataType: 'json',
        success: function(respuesta){
            //console.log(respuesta);
            //console.log(respuesta.carpetas.length);
            if(respuesta.carpetas.length==0){
                $('#row-carpetas').append('<div id="sin-carpetas" class="tipo-objeto" >No hay carpetas.</div>');
            }else{
                $('#sin-carpetas').remove();
                $('#row-carpetas').html('');
            }
            for(var i=0; i<respuesta.carpetas.length; i++){
                //console.log(respuesta.carpetas[i]);
                $('#row-carpetas').append('<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">'+
                '<div class="carpeta" oncontextmenu="return showContextMenux(event);" onclick="nuevaRuta(\''+respuesta.carpetas[i]+'\')">'+
                    '&nbsp;'+
                    '<i class="fas fa-folder"></i>'+
                    '&nbsp;&nbsp;&nbsp;'+acortarNombres(respuesta.carpetas[i])+
                '</div>'+
                '</div>');
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}



function cargarArchivos(ruta){
    $.ajax({
        url: 'ajax/funciones.php?accion=mostrarArchivos',
        method: 'GET',
        data: 'ruta='+localStorage.getItem('rutaActual')+"&tipo="+localStorage.getItem('tipo'),
        dataType: 'json',
        success: function(respuesta){
            //console.log("dasdasdasdasdasdasd");
            //console.log(respuesta);
            //console.log(respuesta.archivos.length);
            if(respuesta.archivos.length==0){
                $('#row-archivos').append('<div id="sin-archivos" class="tipo-objeto">No hay archivos.</div>');
            }else{
                $('#sin-archivos').remove();
                $('#row-archivos').html('');
            }
            for(var i=0; i<respuesta.archivos.length; i++){
                console.log("cargarArchivos: "+respuesta.archivos[i]);
                $('#row-archivos').append('<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">'+
                '<div class="carpeta-archivo" oncontextmenu="descargar(\''+respuesta.archivos[i]+'\');return showContextMenux(event);">'+
                    '<div class="div-imagen" id="div-imagen'+i+'">'+
                        /*'<img class="imagen" id="imagen-archivo'+i+'"></img>'+*/
                        '<i class="icono-archivo'+i+'" style="font-size: 94px; padding-top: 4px;"></i>'+
                    '</div>'+
                        '<div class="pie-imagen">'+
                            '<i class="icono-archivo'+i+'" style="margin-left: 8px;"></i>'+
                            '<div class="nombre-archivo" id="nombre-archivo'+i+'" acortarNombres(this)>'+acortarNombres(respuesta.archivos[i])+'</div>'+
                        '</div>'+
                    '</div>'+
                '</div>');
                tipo(respuesta.archivos[i],i);
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}



function tipo(string,isn){
    var partes = [];
    partes = string.split('.');
    //console.log(partes[1]);
    if(partes[1] == 'txt'){
        $(".icono-archivo"+isn).addClass('fas fa-file-alt');
        //$("imagen-archivo"+isn).attr('src', 'imagenes/txt.png');
        $(".icono-archivo"+isn).css('color','black');
    }else if(partes[1] == 'mp3'){
        $(".icono-archivo"+isn).addClass('fas fa-file-audio');
        $(".icono-archivo"+isn).css('color','#00f2ff');
    }else if(partes[1] == 'mp4'){
        $(".icono-archivo"+isn).addClass('fas fa-film');
        $(".icono-archivo"+isn).css('color','#2e00ff');
    }else if(partes[1] == 'docx'){
        $(".icono-archivo"+isn).addClass('fas fa-file-word');
        $(".icono-archivo"+isn).css('color','green');
    }else if(partes[1] == 'jpg' || partes[1] == 'png'|| partes[1] == 'gif'){
        $('#div-imagen'+isn).html('<img class="imagen" src="'+localStorage.getItem('rutaActual')+string+'"></img>');
        $(".icono-archivo"+isn).addClass('fas fa-image');
    }else if(partes[1] == 'pdf'){
        $(".icono-archivo"+isn).addClass('fas fa-file-pdf');
        $(".icono-archivo"+isn).css('color','red');
    }else if(partes[1] == 'cpp' || partes[1] == 'jar' || partes[1] == 'php' || partes[1] == 'html' || partes[1] == 'js' || partes[1] == 'h' || partes[1] == 'css'){
        $(".icono-archivo"+isn).addClass('fas fa-file-code');
        $(".icono-archivo"+isn).css('color','#51f918');
    }else{
        $(".icono-archivo"+isn).addClass('far fa-file');
        $(".icono-archivo"+isn).css('color','black');
    }
}



function descargar(nombre){
    //$(id).attr(download="download");  
    localStorage.setItem('archivo',nombre);
    var src = localStorage.getItem('rutaActual') +'/'+ nombre;
    console.log('ruta:'+src);
    $('#a-download').attr('href',src);
    $('#a-download').attr('download',nombre);
}



$(document).ready(function(){
    if(localStorage.getItem('tipo')==2){
        $('#span-ruta').html('home');
    }else{
        $('#span-ruta').html(localStorage.getItem('rutaActual'));
    }
});

function actualizarRuta(){
    if(localStorage.getItem('tipo')==2){
        var q = $('#span-ruta').val();
        $('#span-ruta').val('home/' + q.substr(6));
        console.log($('#span-ruta').val());
    }
}



function nuevaRuta(nombre){
    var j= localStorage.getItem('rutaActual')+nombre+'/';
    var k = 'rutaActual='+j;
    console.log(k);
    $.ajax({
        url: 'ajax/funciones.php?accion=nuevaRuta',
        method: 'GET', 
        data: k,
        dataType: 'json',
        success:function(respuesta){
            console.log(respuesta);
            $('#row-archivos').html('');
            $('#row-carpetas').html('');
            localStorage.setItem('rutaActual',j);
            cargarCarpetas(j);
            cargarArchivos(j);
            if(localStorage.getItem('tipo')==2){
                e = 'home'+j.substr(6);
                $('#span-ruta').html(e);
            }else{
                $('#span-ruta').html(j);
            }
            
            //actualizarRuta();
        },
        error:function(error){
            console.log(error);
        }
    });
}



function carpetaAtras(){
    if(localStorage.getItem('ruta')!=localStorage.getItem('rutaActual')){
        var w = localStorage.getItem('rutaActual');
        var temp =[];
        var e = ''; 
        temp = w.split('/');
        for(var i=0; i<temp.length-2; i++){
            e = e + temp[i]+'/';
            console.log(temp[i]+'\n');
        }
        localStorage.setItem('rutaActual',e);
        cargarCarpetas(localStorage.getItem('rutaActual'));
        cargarArchivos(localStorage.getItem('rutaActual'));
        if(localStorage.getItem('tipo')==2){
            e = 'home'+localStorage.getItem('rutaActual').substr(6);
            $('#span-ruta').html(e);
        }else{
            $('#span-ruta').html(localStorage.getItem('rutaActual'));
        }
        
        //$('#span-ruta').html(e);
        //actualizarRuta();
    }
}

/*
$(document).ready(function(){
//    var div = document.getElementById('form');
    $('#form').addClass('animacionRebote');
});*/
