document.getElementById("imagenMenu").onchange = function(e) {
  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(e.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    let preview = document.getElementById('previamente'),
            image = document.createElement('img');
            image.id='hola123';
            image.style.width= '186px';
            image.style.height= '194px';


    image.src = reader.result;

    preview.innerHTML = '';
    preview.append(image);
  };
} 

//funcion para guardar registros 

function btn_Registrar()
{
/*aqui se declaran las variables de javascrip de preferencia que se llamen 
igual que tus campos o por lo menos igual que los id, recorda que entre los parentesis van 
los nombres que le diste en el id de cada input por eso lleva el  #*/
var idTipoMenu = $("#idTipoMenu").val();
var nombreMenu = $("#nombreMenu").val();
var descripcionMenu = $("#descripcionMenu").val();
var estadoMenu = $("#estadoMenu").val();
var costoMenu = $("#costoMenu").val();
var  precioVentaMenu= $("#precioVentaMenu").val();
var imagenMenu = $("#imagenMenu").val();

var ob = {idTipoMenu:idTipoMenu,nombreMenu:nombreMenu,descripcionMenu:descripcionMenu,estadoMenu:estadoMenu,costoMenu:costoMenu,precioVentaMenu:precioVentaMenu,imagenMenu:imagenMenu};
 $.ajax({
            //forma en la que se enviaran los datos 
                type: "POST",
                /*url donde se encuentra el archivo en este caso es un modelo 
                recorda que los modelos en su mayoria solo llevan variables php
                para capturar los datos enviados por ajax*/
                url:"../modelo/registrar_datos.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                  $("#panel_respuesta").html(data);
                 subirImagen();               
                 listar_dato();
                  //para que se actualisen los datos de forma dinamica
                 setTimeout(function(){
                  listar_dato();
                  alert("Registro Guardado Exitosamente");
                 },3000);
                }
             });


}

//esta funcion permite listar la rabla conectandola con el php 

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
                 $("#panel_Menu").html(data);
                }
             });



}

//funcion para llamar al modal de Ingredientes 
function btn_ingredientes(idIngrediente){

var ingrediente=idIngrediente;

    //el arreglo que se mandara en el metodo ajax solo llevara el codigo que es codVehiculo 
   var ob = {ingrediente:ingrediente};
   //metodo ajax que se encarga de enviar los datos o recibirlos jajaja
 $.ajax({
                //forma en la que se enviaran los datos POST
                type: "POST",
                //url del archivo donde se creo la vista para eitcion de registros
                url:"../vista/ingredientes.php",
                data: ob,
                //los eventos que ocurriran antes durante y despues del oncick
                beforeSend: function(objeto){

                },
                success: function(data)
                { 
                 //se llena el panel editar del div con id de nombre panel_editar
                 $("#panel_ingredientes").html(data);

                
                  }
             });
}


//FUNCION PARA AUMENTAR Y DECREMENTAR EL IMPUT 
function incrementar() {
valor = document.getElementById("cantidad");
valor.value ++;
}
 
function decrementar() {
valor = document.getElementById("cantidad");
if (valor.value > 0)valor.value --;
}




var valorEnvio = ""

function selecOp(valor){
  
  document.getElementById("imagen22").value = valor//declararle el valor del select al input
 
  }





$(document).ready(function(){
    $("#idProducto").on('change', function () {
        $("#idProducto option:selected").each(function () {
            var elegido=$(this).val();
            $.post("../modelo/modelo.php", { elegido: elegido }, function(data){
                  $("#hola").html(data);
                
            });     
        });
   });
});

$(document).ready(function(){
    $("#idProducto_ed").on('change', function () {
        $("#idProducto_ed option:selected").each(function () {
            var elegido2=$(this).val();
            $.post("../modelo/modelo2.php", { elegido2: elegido2 }, function(da){
                  $("#hola2").html(da);
                
            });     
        });
   });
});


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



function btn_editar(idStock){


    //el arreglo que se mandara en el metodo ajax solo llevara el codigo que es codVehiculo 
   var ob = {idStock:idStock};
  alert(idStock);
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
var idStock = $("#idStock_ed").val();
var idProducto = $("#idProducto_ed").val();
var idSucursal = $("#idSucursal_ed").val();
var fechaIngresoSucursal = $("#fechaIngresoSucursal_ed").val();
var  descripcionStock= $("#descripcionStock_ed").val();
var estadoStock = $("#estadoStock_ed").val();
var cantidad = $("#cantidad_ed").val();

    //alert (fechai+"-"+marca+"-"+modelo+"-");//+color+"-"+placa+"-"+nchasis+"-"+motor+"-"+kmetraje+"-"+estadov+"-"+sucursal+"-"+caja+"-"+vehiculo);
//(fechai + "-" + marca + "-" + modelo + "-" + color + "-" + placa + "-" + nchasis + "-" + motor + "-" + kmetraje + "-" + estadov + "-" + sucursal + "-" + caja + "-" + vehiculo);

/*el arreglo de datos que se van a enviar por ajax contiene las variables javascript que se acaban de declarar
despues de los : mejor si colocas el mismo nombre que es lo que va 
a ir adento de $_POST[''] en el archivo de modelo de edicion */
var ob = {idStock:idStock, idProducto:idProducto, idSucursal:idSucursal, fechaIngresoSucursal:fechaIngresoSucursal, descripcionStock:descripcionStock, estadoStock:estadoStock, cantidad:cantidad};
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



function btn_eliminar(idStock){
    //el arreglo que se mandara en el metodo ajax solo llevara el codigo que es codVehiculo 
   
   var ob = {idStock:idStock};

  alert(idStock);
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
var idStock = $("#idStock_d").val();



    //alert (fechai+"-"+marca+"-"+modelo+"-");//+color+"-"+placa+"-"+nchasis+"-"+motor+"-"+kmetraje+"-"+estadov+"-"+sucursal+"-"+caja+"-"+vehiculo);
//(fechai + "-" + marca + "-" + modelo + "-" + color + "-" + placa + "-" + nchasis + "-" + motor + "-" + kmetraje + "-" + estadov + "-" + sucursal + "-" + caja + "-" + vehiculo);


/*el arreglo de ob solo lleva esta variable de javascrip que se decalro 
 recorda que despues de los : mejor si se llama igual*/
var ob = {idStock:idStock};
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
function btn_trasladar(idStock){
    //el arreglo que se mandara en el metodo ajax solo llevara el codigo que es codVehiculo 
   
   var ob = {idStock:idStock};

  alert(idProducto);
   //metodo ajax que se encarga de enviar los datos o recibirlos jajaja
 $.ajax({
                //forma en la que se enviaran los datos POST
                type: "POST",
                //url del archivo donde se creo la vista para eitcion de registros
                url:"../vista/trasladar.php",
                data: ob,
                //los eventos que ocurriran antes durante y despues del oncick
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 //se llena el panel editar del div con id de nombre panel_editar
                 $("#panel_trasladar").html(data);
                
                }
             });
}

//subir y guardar imagenes 

function subirImagen(){
    
        var formData = new FormData();
        var files = $('#imagenMenu')[0].files[0];
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


//funcion para recolectar el id del menu 

function btn_om($idmenu2, $nombreMenu2){
alert ($idmenu2+" "+$nombreMenu2);

}

//funcion para listar el div de subcategorias 



//FUNCION PARA FILTRAR LISTADO 

function btn_ic(idTipomenu2){

 var ob = {idTipomenu2:idTipomenu2};

  alert(idTipomenu2);
   //metodo ajax que se encarga de enviar los datos o recibirlos jajaja
 $.ajax({
                //forma en la que se enviaran los datos POST
                type: "POST",
                //url del archivo donde se creo la vista para eitcion de registros
                url:"../vista/tamañoPizza.php",
                data: ob,
                //los eventos que ocurriran antes durante y despues del oncick
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 //se llena el panel editar del div con id de nombre panel_editar
                 $("#listarCategoria").html(data);
                
                }
             });
}


function btn_p(vara){

 var ob = {vara:vara};

  alert(vara);
   //metodo ajax que se encarga de enviar los datos o recibirlos jajaja
 $.ajax({
                //forma en la que se enviaran los datos POST
                type: "POST",
                //url del archivo donde se creo la vista para eitcion de registros
                url:"../vista/subcategoriaMenu.php",
                data: ob,
                //los eventos que ocurriran antes durante y despues del oncick
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 //se llena el panel editar del div con id de nombre panel_editar
                 $("#listarCat").html(data);
                
                }
             });
}
