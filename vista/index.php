
<?php
session_start();
if(!isset($_SESSION["usuario"])){
//$user=$_SESSION['usuario']
    header("location:../login/cierre.php"); // escribir en todas las pag
}/*else
if($_SESSION['rol']!='operador'){
  header("location:../login/login.html"); // escribir en todas las pag
}*/
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
    
    <link rel="stylesheet" type="text/css" href="../css/estilos2.css">
    <link rel="stylesheet" type="text/css" href="../css/csst.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script type ="text/javascript" src="../css/bootstrap-filestyle.min.js"></script>
    <script type="text/javascript" src="../js/habilitaDesabInput.js"></script>
    <script type="text/javascript" src="../controlador/productos.js"></script>
    <script type="text/javascript" src="../toastr-master/toastr.js"></script>
    <script type="text/javascript" src="https://spin.js.org/spin.js"></script>
    <link rel="stylesheet" type="text/css" href="../toastr-master/toastr.scss"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link href="http://codeseven.github.com/toastr/toastr-responsive.css" rel="stylesheet"/>-->
    

	
	
	
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
        <li><a class="" style="text-decoration: none;" href="login/cierre.php" >CERRAR SESI&Oacute;N</REPORTE></a></li>
      </ul>
  </nav>  

<div class="panel panel-default">
      <div class="panel-heading" style="background-color:#FDFEFE;">
        <h2 class="panel-title" style=" text-align: center; width: 100%; height: 20px; font-size: 20px; margin-bottom: 0px;">INGRESO DE PRODUCTO</h2>
      <div class="row vertical-align voy" style="margin-bottom: 0px;">
        <div class="col-xs-10 margenes" style="margin-top: 0px;">
          <div class="panel-body" style="margin-top: 0px;">
        <!--aqui formulario bootstrap-->
            <form class="form-horizontal company"  action="../modelo/administrarProducto.php" method="post">
              <div class="form-group"style="margin-top:0px; margin-bottom: 0px">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="name" class=" control-label bordesredondos" style="height: 5px; color: purple">Nombre Producto</label>
                    <input type="text" class="form-control colorInput2 estilord desbloquea" id="nombreProducto" name='nombreProducto' placeholder="*PRODUCTO" required="required" disabled="disabled">
                  </div>
                  <div class="col-sm-4">   
                    <label for="zipcode"  class=" control-label" style="color: purple">Tipo de Producto</label>
                    <input type="text" class="form-control colorInput2 estilord desbloquea"
                    required="required" disabled="disabled" id="idTipoProducto" name='idTipoProducto' placeholder="*TIPO DE PRODUCTO">
                  </div>
                    <div class="col-sm-4" >
                      <label for="city" class=" control-label" style="color: purple;">Unidad de medida</label>
                      <input type="text" class="form-control estilord desbloquea" required="required" disabled="disabled" id='idUnidadMedida' name='idUnidadMedida' placeholder="*UNIDAD DE MEDIDA">
                    </div>
                  </div>
                </div>
                <div class="form-group" style="margin-top:0px; margin-bottom: 0px";>
                  <div class="row">     
                    <div class="col-sm-4">
                      <label for="fingreso" class=" control-label style="color: purple">fecha de Ingreso producto</label>
                      <input type="text" class="form-control colorInput estilord desbloquea" required="required" disabled="disabled" id="fechaIngresoProducto" name='fechaIngresoProducto' placeholder="*FECHA DE INGRESO">
                    </div>
                    <div class="col-sm-4">
                      <label for="fvencimiento" class=" control-label"style="color: purple">Fecha de Vencimiento</label>
                      <input type="text" class="form-control colorInput estilord desbloquea" required="required" disabled="disabled" id='fechaVencimientoProducto' name='fechaVencimientoProducto' placeholder="*FECHA DE VENCIMIENTO">
                    </div>
                    <div class="col-sm-4">
                      <label for="estado" class=" control-label"style="color: purple">Estado</label>
                      <input type="text" class="form-control colorInput estilord desbloquea" required="required" disabled="disabled" id="estadoProducto" name='estadoProducto' placeholder="*ESTADO">
                    </div>
                  </div>
                </div>
                <div class="form-group"style="margin-top: 0px; margin-bottom: 0px;">
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="sucursal" class=" control-label"style="color: purple">Sucursal</label>
                      <input type="text" class="form-control estilord desbloquea" required="required" disabled="disabled" id="idSucursal" name='idSucursal' placeholder="*SUCURSAL">
                    </div>
                      <div class="col-sm-4">
                        <label for="costo" class=" control-label"style="color: purple">Costo Producto</label>
                        <input type="text" class="form-control estilord desbloquea" required="required" disabled="disabled" id='costoProducto' name='costoProducto' placeholder="*COSTO PRODCUTO">
                      </div>
                      <div class="col-sm-4">
                        <label for="stock" class="control-label"style="color: purple">Stock/Existencia</label>
                        <input type="text" class="form-control colorInput estilord desbloquea" required="required" disabled="disabled" id="stockProducto" name='stockProducto' placeholder="*EXISTENCIA/STOCK">
                      </div>
                    </div>
                </div>
                <div class="form-group"style="margin-top:0px;margin-bottom: 0px">
                  <div class="row">
                    <div class="col-sm-12">
                      <LABEL for="imagen" class="control-label "style="color: purple">IMAGEN </LABEL>
                      <input type="file" enctype="multipart/form-data"  id="imagenProducto" name="imagenProducto" placeholder="*IMAGEN"required="required" class="filestyle"  data-buttonName="btn-primary" style="background-color: #e2f0fb;">
                      <input type='hidden' name='insertar' value='insertar'>
                    </div> 
                  </div>
                </div> 
              </div>
            </div>
            <div class="col-xs-6" style="margin-left: 80px;">
              <div class="form-group" style="margin-top: 0px;">
                <div class="col-sm-6" style="margin-top: -5PX;">
                  <label for="imagen"  class="col-sm-6 control-label" style="text-align: center;">Imagen</label>
                    <table border="1" style="width: 130px;">
                      <tbody>
                        <tr>
                          
                          <td style="height: 190px" colspan="2" id="preview"   alt="" />  </td>

                        </tr>
                      </tbody>
                    </table>    
                </div>
                <div class="col-sm-6" style="margin-top: 5px;">
                  <button type="submit" class="btn btn-primary btn-lg btn-block desbloquea" disabled="disabled" onclick="guardar()">GUARDAR <i class="fa fa-save"></i></button>
                  <button type="button" class="btn btn-success btn-lg btn-block " disabled="disabled">MODIFICAR <i class="fa fa-pencil-square-o"></i></button>
                  <button type="button" class="btn btn-warning btn-lg btn-block " disabled="disabled">BUSCAR <i class="fa fa-search"></i></button>
                  <button type="button" class="btn btn-info btn-lg btn-block" onclick="habilita();">NUEVO <i class="fa fa-pencil-square-o"></i></button>
                  <button type="button" class="btn btn-danger btn-lg btn-block desbloquea" disabled="disabled" onclick="deshabilita();">CANCELAR <i class="fa fa-trash"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
    </div>
        <script type="text/javascript">
          listar_dato();
        </script>
        <div id="panel_listado"></div>
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