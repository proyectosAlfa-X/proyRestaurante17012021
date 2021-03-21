
<?php
require_once('../../conexion/conexion2.php');

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
   <script type="text/javascript" src= "../controlador/food.js"></script>
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
      <h2 class="panel-title" style=" text-align: center; width: 100%; height: 20px; font-size: 20px; margin-bottom: 0px;">INGRESO DE MENU</h2>
        <div class="row vertical-align" style="margin-bottom: 0px;">
          <div class="col-xs-10 margenes" style="margin-top: 0px;">
            <div class="panel-body" style="margin-top: 0px;">
        <!--aqui formulario bootstrap-->
              <!--<form class="form-horizontal company"  action="../modelo/administrarMenu.php" method="post">-->
                <div class="form-group"style="margin-top:0px; margin-bottom: 0px">
                  <div class="row" >
                    <div class="col-sm-6">
                      <label class=" control-label" style="color: purple; ">Categoria</label>
                         <div style="border-color: #8E44AD; border-width: 1px;
                         border-style: solid; width: 100%;background-color: #F4ECF7;border-radius: 20px;" align="center">
                        <?php 

                           $db5= Conexion::StartUp();     
                           $select5=$db5->query("SELECT * FROM tipoMenu where estadoTipoMenu='A'"); ?>
                           <SELECT  id="idTipoMenu" placeholder="*TIPO DE PRODUCTO" required="required" class="desbloquea" name='idTipoMenu'required="required" disabled="disabled"  style="height: 18px;  background-color: #F5EEF8; margin: none; border:none; width: 93%">
                    
                        <?php  while($row13 =$select5->fetch(PDO::FETCH_OBJ)){ 
                        $codS=$row13->idTipoMenu;
                        $descS=$row13->descripcionTipoMenu;
                        ?>    
                      <option id="idTipoMenu" value="<?php echo $codS; ?> "> <?php echo $descS; ?></option>
                      <?php  }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <label class=" control-label" style="color: purple">NOMBRE DEL MENU </label>
                  <input type="TEXT" class="form-control colorInput estilord desbloquea" required="required" disabled="disabled" id="nombreMenu" name='nombreMenu' placeholder="*NOMBRE DE MENU" value="">

                  <input type="hidden" class="form-control colorInput estilord desbloquea" required="required" disabled="disabled" id="descripcionMenu" name='descripcionMenu' placeholder="*NOMBRE DE MENU" value="Menu RicoDeli">  

                  <input type="hidden" class="form-control colorInput estilord desbloquea" required="required" disabled="disabled" id="estadoMenu" name='estadoMenu' placeholder="*NOMBRE DE MENU" value="A">  

                  <input type="hidden" class="form-control colorInput estilord desbloquea" required="required" disabled="disabled" id="costoMenu" name='costoMenu' placeholder="*NOMBRE DE MENU" value="00">  


                </div>
              </div>
          </div>
          <div class="form-group"style="margin-top:0px; margin-bottom: 0px">
            <div class="row" >  
              <div class="col-sm-6">
                <label  class=" control-label" style="color: purple">PRECIO DE VENTA </label>
                <input type="TEXT" class="form-control colorInput estilord desbloquea" required="required" disabled="disabled" id="precioVentaMenu" name='precioVentaMenu' placeholder="*PRECIO DE VENTA" value="">
              </div>
              <div class="col-sm-6">
                <LABEL for="imagen" class="control-label "style="color: purple">IMAGEN </LABEL>
                      <input type="file" enctype="multipart/form-data"  id="imagenMenu" name="imagenMenu" placeholder="*IMAGEN"required="required" class="filestyle"  data-buttonName="btn-primary" style="background-color: #e2f0fb;">
                      <input type='hidden' name='insertar' value='insertar'>
                    </div> 
                  </div>
                </div> 
               
              </div>
            </div>
            <div class="col-xs-6" style="margin-left: 80px;">
              <div class="form-group" style="margin-top: 0px;">
                <div class="col-sm-6" style="margin-top: -5PX;">
                  <script type="text/javascript" src= "../controlador/food.js"></script>
                  <label for="imagen"  class="col-sm-6 control-label" style="text-align: center;">Imagen</label>
                    <table border="1" style="width: 130px;">
                      <tbody>
                        <tr>
                          
                          <td style="height: 190px" colspan="2" id="previamente"   alt="" />  </td>
                          <script>
                            
                          </script>

                        </tr>
                      </tbody>
                    </table>    
                </div>
                <div class="col-sm-6" style="margin-top: 5px;">
                  <button type="button" class="btn btn-primary btn-lg btn-block desbloquea" disabled="disabled" onclick="btn_Registrar();">GUARDAR <i class="fa fa-save"></i></button>
                  <button type="button" class="btn btn-success btn-lg btn-block " disabled="disabled">MODIFICAR <i class="fa fa-pencil-square-o"></i></button>
                  <button type="button" class="btn btn-warning btn-lg btn-block " disabled="disabled">BUSCAR <i class="fa fa-search"></i></button>
                  <button type="button" class="btn btn-info btn-lg btn-block" onclick="habilita();">NUEVO <i class="fa fa-pencil-square-o"></i></button>
                  <button type="button" class="btn btn-danger btn-lg btn-block desbloquea" disabled="disabled" onclick="deshabilita();">CANCELAR <i class="fa fa-trash"></i></button>
                </div>
              </div>
            </div>
          <!--</form>-->
        </div>
    </div>       
 <script> listar_dato();</script>
         
        <div id="panel_Menu"></div>
        
        
      </body>



      <!-- Modal ingredeientes-->

  <div class="row vertical-align" style="margin-top: 0px;">
<footer>
Servicios Tecnologicos ALFA-X
<BR>
GUATEMALA, CENTROAMERICA<BR>
TEL:    
</footer>
</div>
</html>