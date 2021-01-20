
function listar_dato(){
    var ob = "";
 $.ajax({
                type: "POST",
                url:"../vista/listar.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 //aqui estas mandando a el div de panel listado de la vista 
                 $("#panel_listado").html(data);
                }
             });

}

function subirImagen(){
    
        var formData = new FormData();
        var files = $('#imagenProducto')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: '../modelo/upload.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    $(".card-img-top").attr("src", response);
                } else {
                    alert('Formato de imagen incorrecto.');
                }
            }
        });
        return false;
    }


    

function guardar(){
  subirImagen(); 
  realizado();

}


document.getElementById("imagenProducto").onchange = function(e) {
  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(e.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    let preview = document.getElementById('preview'),
            image = document.createElement('img');
            image.style.width= '186px';
            image.style.height= '194px';


    image.src = reader.result;

    preview.innerHTML = '';
    preview.append(image);
  };
}




function realizado(){
    Command: toastr["success"]("Operaci&oacute;n realizada con &eacute;xito", "¡ALERTA!")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}


}

function noRealizado(){
 Command: toastr["error"]("El registro no se pudo guardar", "!ERROR!")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
}


/*$(window).on('load', function () {
      setTimeout(function () {
    $(".loader-page").css({visibility:"hidden",opacity:"0"})
  }, 2000);
     
});*/



function btn_editar(idProducto){
    //el arreglo que se mandara en el metodo ajax solo llevara el codigo que es codVehiculo 
   var ob = {idProducto:idProducto};
  alert(idProducto);
   //metodo ajax que se encarga de enviar los datos o recibirlos jajaja
 $.ajax({
                //forma en la que se enviaran los datos POST
                type: "POST",
                //url del archivo donde se creo la vista para eitcion de registros
                url:"../vista/actualizar1.php",
                data: ob,
                //los eventos que ocurriran antes durante y despues del oncick
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 //se llena el panel editar del div con id de nombre panel_editar
                 $("#panel_editar").html(data);
                
                }
             });
}

function btn_guardar_edicion()
{
/*aqui se declaran las variables de javascrip de preferencia que se llamen 
igual que tus campos o por lo menos igual que los id, recorda que entre los parentesis van 
los nombres que le diste en el id de cada input por eso lleva el  #*/
var idProducto = $("#idProducto_ed").val();
var nombreProducto = $("#nombreProducto_ed").val();
var idTipoProducto = $("#idTipoProducto_ed").val();
var idUnidadMedida = $("#idUnidadMedida_ed").val();
var fechaIngresoProducto = $("#fechaIngresoProducto_ed").val();
var fechaVencimientoProducto = $("#fechaVencimientoProducto_ed").val();
var estadoProducto = $("#estadoProducto_ed").val();
var idSucursal = $("#idSucursal_ed").val();
var costoProducto = $("#costoProducto_ed").val();
var stockProducto = $("#stockProducto_ed").val();

    //alert (fechai+"-"+marca+"-"+modelo+"-");//+color+"-"+placa+"-"+nchasis+"-"+motor+"-"+kmetraje+"-"+estadov+"-"+sucursal+"-"+caja+"-"+vehiculo);
//(fechai + "-" + marca + "-" + modelo + "-" + color + "-" + placa + "-" + nchasis + "-" + motor + "-" + kmetraje + "-" + estadov + "-" + sucursal + "-" + caja + "-" + vehiculo);

/*el arreglo de datos que se van a enviar por ajax contiene las variables javascript que se acaban de declarar
despues de los : mejor si colocas el mismo nombre que es lo que va 
a ir adento de $_POST[''] en el archivo de modelo de edicion */
var ob = {idProducto:idProducto,nombreProducto:nombreProducto,idTipoProducto:idTipoProducto,idUnidadMedida:idUnidadMedida,fechaIngresoProducto:fechaIngresoProducto,fechaVencimientoProducto:fechaVencimientoProducto,estadoProducto:estadoProducto,idSucursal:idSucursal,costoProducto:costoProducto,stockProducto:stockProducto};
 $.ajax({
            //forma en la que se enviaran los datos 
                type: "POST",
                /*url donde se encuentra el archivo en este caso es un modelo 
                recorda que los modelos en su mayoria solo llevan variables php
                para capturar los datos enviados por ajax*/
                url:"../modelo/guardar_datos.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                  $("#panel_respuesta_edicion").html(data);
                 //listar_dato();


                 setTimeout(function(){
                  $("#panel_respuesta_edicion").html("");
                 },2000);
    
                 //para que el modal desaparezca a los dos segundos se coloca tiempo
                  setTimeout(function(){
                  $("#myModal").modal("hide").fadeIn("slow");
                 },2500);

                  //para que se actualisen los datos de forma dinamica
                 setTimeout(function(){
                  listar_dato();
                  alert("realizada la actualizacion");
                 },3000);
                
                

                }
             });


}


function btn_eliminar(idProducto){
    //el arreglo que se mandara en el metodo ajax solo llevara el codigo que es codVehiculo 
   
   var ob = {idProducto:idProducto};

  alert(idProducto);
   //metodo ajax que se encarga de enviar los datos o recibirlos jajaja
 $.ajax({
                //forma en la que se enviaran los datos POST
                type: "POST",
                //url del archivo donde se creo la vista para eitcion de registros
                url:"../vista/eliminar.php",
                data: ob,
                //los eventos que ocurriran antes durante y despues del oncick
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 //se llena el panel editar del div con id de nombre panel_editar
                 $("#panel_eliminar").html(data);
                
                }
             });
}


function btn_guardar_eliminar()
{

//solo se va a declarar una variable que va a servir como parametro para identifficar el registro
var idProducto = $("#idProducto_d").val();
var img4 = $("#imagen4").val();


    //alert (fechai+"-"+marca+"-"+modelo+"-");//+color+"-"+placa+"-"+nchasis+"-"+motor+"-"+kmetraje+"-"+estadov+"-"+sucursal+"-"+caja+"-"+vehiculo);
//(fechai + "-" + marca + "-" + modelo + "-" + color + "-" + placa + "-" + nchasis + "-" + motor + "-" + kmetraje + "-" + estadov + "-" + sucursal + "-" + caja + "-" + vehiculo);


/*el arreglo de ob solo lleva esta variable de javascrip que se decalro 
 recorda que despues de los : mejor si se llama igual*/
var ob = {idProducto:idProducto,img4:img4};
 $.ajax({
                //forma en que se van a enviar los datos en el ajax POST
                type: "POST",
                //url donde se encuentra el archivo donde se enviaran los datos o variables del ob
                url:"../modelo/eliminar_datos.php",
                data: ob,
                //eventos que ocurrirar antes, durante y despues de la ejecucion de la funcion 
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_respuesta_eliminar").html(data);
                 //listar_dato();

                 setTimeout(function(){
                  $("#panel_respuesta_eliminar").html("");
                 },2000);
    
                  setTimeout(function(){
                  $("#myModalEliminar").modal("hide").fadeIn("slow");
                 },2500);

                 setTimeout(function(){
                  
                  listar_dato();
                 },3000);
                

                }
             });


}

