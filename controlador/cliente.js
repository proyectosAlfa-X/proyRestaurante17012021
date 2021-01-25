$(document).ready(function()
        {
	$("#nit").focus();
            // -----------------------------
            // Al hacer clic en el botón para buscar
            $("#busqueda").click(function()
            {
                var nit = $("#nit").val();
                
                alert(nit);
             //$("#clienteE").attr("value",nit);

	var ob={nit:nit};
	$.ajax({
                         async: true,
                         type: "POST",
                         dataType: "json",
                         contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                         url: "../modelo/muestraCliente.php",
                         data: ob,
                         //beforeSend: antesEA,
                         success: muestraDatos,
                         //timeout: 4000,
                         error: errorA
                 });
                return false;

            });
        });

function antesEA(datos){
 alert("ingresando");
}
function errorA(){
$('#modalNCliente').modal('show');
}
 function muestraDatos( datos)
        {
            
            
            $("#busqueda").val("");
            $("#nitE").attr("value", datos.nit );
            $("#clienteE").attr("value", datos.cliente );
            $("#direccionC").attr("value", datos.direccionC );
            $("#fecha").attr("value", datos.fecha );

            
        }
