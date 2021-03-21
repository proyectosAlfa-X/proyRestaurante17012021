
<?php
require_once('../../conexion/conexion2.php');

session_start();
if(!isset($_SESSION["usuario"])){
//$user=$_SESSION['usuario']
    header("location:../../login/cierre.php"); // escribir en todas las pag
}/*else
if($_SESSION['rol']!='operador'){
  header("location:../login/login.html"); // escribir en todas las pag
}*/


$codS1 = $_SESSION["codSucursal"];
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos2.css">
    <link rel="stylesheet" type="text/css" href="../../css/csst.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <script type ="text/javascript" src="../../css/bootstrap-filestyle.min.js"></script>
    <script type="text/javascript" src="../../js/habilitaDesabInput.js"></script>
    <script type="text/javascript" src="../controlador/stock.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.js"></script>
    <script type="text/javascript" src="https://spin.js.org/spin.js"></script>
    <link rel="stylesheet" type="text/css" href="../../toastr-master/toastr.scss"/>
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
        <li><a  class="active" style="text-decoration: none;" href="../../MenuPrincipal.php">MEN&Uacute; PRINCIPAL</a></li>
        <li><a href="#" style="text-decoration: none;">FACTURACION</a></li>
        <li><a href="#"style="text-decoration: none;">COMPRAS</a></li>
        <li><a href="#" style="text-decoration: none;">MANUAL</a></li>
        <li><a class="" style="text-decoration: none;" href="../../login/cierre.php" >CERRAR SESI&Oacute;N</REPORTE></a></li>
      </ul>
  </nav>  

<div class="panel panel-default">
      <div class="panel-heading" style="background-color:#FDFEFE;">
        <h2 class="panel-title" style=" text-align: center; width: 100%; height: 20px; font-size: 20px; margin-bottom: 0px;">INGRESO DE PRODUCTO A SUCURSAL</h2>
      <div class="row vertical-align" style="margin-bottom: 0px;">
        <div class="col-xs-10 margenes" style="margin-top: 0px;">
          <div class="panel-body" style="margin-top: 0px;">
        <!--aqui formulario bootstrap-->
            <form class="form-horizontal company"  action="../modelo/administrarStock.php" method="post">
              <div class="form-group"style="margin-top:0px; margin-bottom: 0px">
                <div class="row" >
                   <div class="col-sm-4">
                      <label for="fingreso" class=" control-label" style="color: purple">fecha de Ingreso a Sucursal</label>
                      <input type="date" class="form-control colorInput estilord desbloquea" required="required" disabled="disabled" id="fechaIngresoSucursal" name='fechaIngresoSucursal' placeholder="*FECHA DE INGRESO" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                
                  <div class="col-sm-4">   
                    <label for="TipodeProducto"  class=" control-label" style="color: purple">Producto</label>
                      <div style="border-color: #8E44AD; border-width: 1px;
   border-style: solid; width: 100%;background-color: #F4ECF7;border-radius: 20px;" align="center">
                        <?php 
                           $db2= Conexion::StartUp();     
                           $select1=$db2->query("SELECT * FROM producto  where estadoProducto='A'"); ?>
                          

                           <SELECT  id="idProducto" disabled="disabled" class="desbloquea"  placeholder="*PRODUCTO" required="required" class="" name='idProducto'   style="height: 18px;  background-color: #F5EEF8; margin: none; border:none; width: 93%">
                   <option  value="0" > [Elija una Opcion]</option>  
                        <?php  while($row1 =$select1->fetch(PDO::FETCH_OBJ)){ 
                    $codTP=$row1->idProducto;
                   $descTP=$row1->nombreProducto;
                   $descImg=$row1->imagenProducto;
                  
                   ?> 

                 <option  value="<?php echo $codTP; ?> " > <?php echo $descTP; ?></option>
                <?php 
                 }

                  ?>
                    </select>
            
                    </div>
                  </div>
                  
                    <div class="col-sm-4" align="center">
                        <label for="costo" class=" control-label"style="color: purple">Cantidad</label>
                        <input type="text" class="form-control estilord desbloquea" required="required" disabled="disabled" id='cantidad' name='cantidad' placeholder="*COSTO PRODCUTO">
                        <input type='hidden' name='insertar' value='insertar'>
                        <button type="button" style="width: 45%; margin-top: 2PX; background: #AF7AC5;" class="btn btn-primary" onclick="incrementar()"> + </button>
                        <button type="button" style="width: 45%; margin-top: 2PX; background: #FF7514; font-size: 14px;" class="btn btn-primary" onclick="decrementar()"> -</a> </button>
                      </div>                   
                    </div>
                  </div>
                <div class="form-group" style="margin-top:0px; margin-bottom: 0px";>
                  <div class="row">     

                     <div class="col-sm-4" style="visibility: hidden;">
                      <label for="sucursal" class=" control-label"style="color: purple">Sucursal</label>
                         <div style="border-color: #8E44AD; border-width: 1px;
   border-style: solid; width: 100%;background-color: #F4ECF7;border-radius: 20px;" align="center">
                        <?php 

                           $db4= Conexion::StartUp();     
                           $select3=$db4->query("SELECT * FROM sucursal where estadoSucursal='A' and idSucursal='$codS1'"); ?>
                           <SELECT  id="idSucursal" placeholder="*TIPO DE PRODUCTO"  disabled="disabled" class="desbloquea"  required="required" class="" name='idSucursal' style="height: 18px;  background-color: #F5EEF8; margin: none; border:none; width: 93%">
                    
                        <?php  while($row1 =$select3->fetch(PDO::FETCH_OBJ)){ 
                    $codS=$row1->idSucursal;
                   $descS=$row1->NombreSucursal;
                   ?>    
                 <option id="idSucursal" value="<?php echo $codS; ?> "> <?php echo $codS.$descS; ?></option>
                <?php  }
                  ?>
                    </select>
                    </div>
                  </div>
              
                    <div class="col-sm-4" style="visibility: hidden;">
                      <label for="fvencimiento" class=" control-label"style="color: purple">Descripcion</label>
                      <input type="text" class="form-control colorInput estilord desbloquea" required="required" disabled="disabled" id='descripcionStock' name='descripcionStock' placeholder="*DESCRIPCION" value="INGRESO A SUCURSAL">
                    </div>
                    <div class="col-sm-4"style="visibility: hidden;">
                      <label for="estado" class=" control-label"style="color: purple">Estado</label>
                      <input type="text" class="form-control colorInput estilord desbloquea" required="required" disabled="disabled" id="estadoStock" name='estadoStock' placeholder="*ESTADO" value="A">
                    </div>
                                
                  
                     
                     
                    </div>
                </div>
                
              </div>
            </div>
            <div class="col-xs-6" style="margin-left: 80px;">
              <div class="form-group" style="margin-top: 0px;">
                <div class="col-sm-6" style="margin-top: -5PX; align-items: center;">
                  <label for="imagen"  class="col-sm-6 control-label" style="text-align: center;">Imagen</label>
                    <table border="1" style="width: 130px;">
                      <tbody>
                        <tr>

                            
                          
                          <td style="height: 190px" colspan="2" id="preview"   alt="" /><div align="center" id='hola'></div></td>
                          
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