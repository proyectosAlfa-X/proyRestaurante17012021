<!DOCTYPE html>
<html>
<head>
	<title>&Oacute;rden</title>

<?php
session_start();
if(!isset($_SESSION["usuario"])){
//$user=$_SESSION['usuario']
    header("location:../../login/cierre.php"); // escribir en todas las pag
}/*else
if($_SESSION['rol']!='operador'){
  header("location:../login/login.html"); // escribir en todas las pag
}*/
?> 
    <link rel="stylesheet" type="text/css" href="../../css/estilos2.css">
    <link rel="stylesheet" type="text/css" href="../../css/estiloscss.css">
    <link rel="stylesheet" type="text/css" href="../../css/csst.css">
    <link rel="stylesheet" type="text/css" href="../../estilos/estiloComanda.css">
    <link rel="stylesheet" type="text/css" href="../../estilos/bootstrap.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/habilitaDesabInput.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../../estilos/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../estilos/css/bootstrap.css">
    
   <script type ="text/javascript" src="../../css/bootstrap-filestyle.min.js"></script>
    <script type="text/javascript" src="../../js/habilitaDesabInput.js"></script>
    <script type="text/javascript" src="../../controlador/productos.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.js"></script>
    <script type="text/javascript" src="https://spin.js.org/spin.js"></script>
    
    <script src="../controlador/cliente.js"></script>
    <link rel="stylesheet" type="text/css" href="../../toastr-master/toastr.scss"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
    <script type="text/javascript">
    $(window).load(function() {
    $(".loader").fadeOut("slow");
    });
  </script>
    <div class="loader"></div>
  
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn" style="margin-top: -3px;">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">RICODELI</label>
      <ul>
        <li><a  class="active" style="text-decoration: none;" href="../MenuPrincipal.php">MEN&Uacute; PRINCIPAL</a></li>
        <li><a href="#" style="text-decoration: none;">FACTURACION</a></li>
        <li><a href="#"style="text-decoration: none;">COMPRAS</a></li>
        <li><a href="#" style="text-decoration: none;">MANUAL</a></li>
        <li><a class="" style="text-decoration: none;" href="../login/cierre.php" >CERRAR SESI&Oacute;N</REPORTE></a></li>
      </ul>
  </nav>  <br>


<div class="text-center" style="width: 400px; margin-left:auto; margin-right:auto; margin-top:0.1px;">
      <label class="control-label estilord">B&uacute;squeda de Clientes por Nit</label>
      <div class="input-group" style="margin-top: 0.01px;">
 <input type="text" class="form-control tI colorInput2 estilord"   name="nit" id="nit" required="required" 
 style="size: 10px;">
      <span class="input-group-btn">
       <button type="button" class="btn  btn-xs btns1"  name="busqueda" id="busqueda"><!--<span class="glyphicon glyphicon-search"></span>--><p class="pWhite">Buscar</p></button>
       </span>
    </div>
     </div><br>
     <!--termina buscar-->
  <div class="container" style="border-radius: 30px;"><p class="text-center"><strong>DATOS DEL CLIENTE</strong></p>
  <div class="form-group">
    <div class="row">
    
    <div class="col-md-3">
    <label class="control-label formatoTextoL">NOMBRES</label>
    <input type="text" class="form-control tI colorInput2 estilord"  readonly="readonly" name="" id="clienteE" required="required" >
  </div>
  <div class="col-md-3">
    <label class="control-label formatoTextoL">DIRECCI&Oacute;N</label>
    <input type="text" class="form-control tI colorInput2 estilord"  readonly="readonly" name="pilotoExterno" 
    id="direccionC" required="required" >
  </div>
  <div class="col-md-3">
    <label class="control-label formatoTextoL">TEL&Eacute;FONO</label>
    <input type="text" class="form-control tI colorInput2 estilord"  readonly="readonly" name="pilotoExterno" id="nitE" required="required" >
  </div>
  <div class="col-md-3">
    <label class="control-label formatoTextoL">FECHA</label>
    <input type="text" class="form-control tI colorInput2 estilord"  readonly="readonly" name="pilotoExterno"  required="required" id="fecha">
  </div>


    </div>
  </div>

  </div>

  <!-- inicia tabla -->

<div style="margin-right: auto; margin-left: auto; width: 98%;" >
            
        <table class="table table-hover" width="100%" >
            <caption class="text-center">DATOS DE LA &oacute;RDEN<?php //echo " ".$_SESSION["municipio"].' '. $_SESSION["direcc"];?></caption>
            <thead>
              


<!--cuerpo de la tabla que me muestra los datos segun el numero de registros -->

                <tr>
                    <th class="texto-blanco text-center">Cantidad</th>
                    <th class="texto-blanco text-center">CONCEPTO</th>
                    <th class="texto-blanco text-center">PRECIO</th>
              <th class="texto-blanco text-center">SUBTOTAL</th>
                </tr>
            </thead>
            <?php
            
 ?>

            <tbody>
               <tr>
                    <td data-label="C&oacute;digo"><?php //echo $codRentaVehiculo;?></td>
                    <td data-label="Cliente"><?php //echo $cliente;?></td>
                    <td data-label="Cui cliente"><?php //echo $cuiCliente;?></td>
                    <td data-label="C&oacute;digo veh&iacute;culo"><?php //echo $codVe; ?></td>
                    
    <!-- <td data-label="Eliminar"><button type="button" class="btn btn-danger btn-xs tBoton" 
      onclick="btn_genera_convenio('<?php //echo $codRentaVehiculo;?>');"><span class="glyphicon glyphicon-list-alt"></span>Convenio</button>
     </td>
      <td data-label="Eliminar"><button id="codRentaVehiculo" class="btn btn-warning btn-xs tBoton" 
  onclick="btn_genera_boleta('<?php //echo $codRentaVehiculo; ?>');"><span class="glyphicon glyphicon-edit"></span>Boleta</button></td>

     <td data-label="Eliminar"><button type="button" class="btn btn-success btn-xs tBoton" data-toggle="modal" data-target="#modalRecibir" 
      onclick="btnRecibirVehiculo('<?php //echo $codVe;?>');"><span class="glyphicon glyphicon-import"></span>Recibir</button>
     </td>
   -->

           </tr>
                
               </tbody>
               <?php

//}

?>
        </table>
      </div>
        <?php //else:?>
          <br>
          <?php //include("../modelo/muestraCliente.php");?>
  <div class="alert alert-danger text-center" role="alert">
  <strong>No existen datos!</strong>  </div>
<?php //endif;?>

   
  <!--termina tabla-->
    </div>  <!-- termina div container-->
   


<!-- termina tabla -->

<!-- Modal -->
  <div class="modal fade" id="modalNCliente" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg tmodal">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background: #AF7AC5;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white;">Cliente no encontrado, llene los campos para registrar un nuevo cliente.</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer" style="background: #F8781D;">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!--termina modal-->
      </body>
    

  <div class="row vertical-align" style="margin-top: 0px;">
<footer>
Servicios Tecnologicos ALFA-X
<BR>
GUATEMALA, CENTROAMERICA<BR>
TEL:    
</footer>
</div>
</html>
