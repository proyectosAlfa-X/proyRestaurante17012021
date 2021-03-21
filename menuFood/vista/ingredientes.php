<?php
require_once('../../conexion/conexion2.php');
$idingrediente=$_POST['ingrediente'];
?>
                <div class="form-group" style="margin-top:0px; margin-bottom: 0px;" id="ingredientes">
                  <div class="row">  


                     <div class="col-sm-4">
                      <input type="hidden" name="" id="mplv" value="<?php echo $idingrediente?>">
                      <label for="sucursal" class=" control-label" style="color: purple; ">Producto</label>
                         <div style="border-color: #8E44AD; border-width: 1px;
   border-style: solid; width: 100%;background-color: #F4ECF7;border-radius: 20px;" align="center">
                        <?php 

                           $db4= Conexion::StartUp();     
                           $select3=$db4->query("SELECT stock.idstock as idstock, producto.nombreProducto as nombreProducto FROM stock, Producto where stock.idproducto=producto.idproducto and stock.estadoStock='A'"); ?>
                           <SELECT  id="idSucursal" placeholder="*TIPO DE PRODUCTO" required="required" class="" name='idSucursal' style="height: 18px;  background-color: #F5EEF8; margin: none; border:none; width: 93%">
                    
                        <?php  while($row1 =$select3->fetch(PDO::FETCH_OBJ)){ 
                    $codS=$row1->idstock;
                   $descS=$row1->nombreProducto;
                   ?>    
                 <option id="idSucursal" value="<?php echo $codS; ?> "> <?php echo $codS.$descS; ?></option>
                <?php  }
                  ?>
                    </select>
                    </div>
                  </div>
                   <div class="col-sm-4" align="center">
                        <label for="costo" class=" control-label"style="color: purple">Cantidad</label>
                        <input type="text" class="form-control estilord " required="required" id='cantidad' name='cantidad' placeholder="*COSTO PRODCUTO">
                        <input type='hidden' name='insertar' value='insertar'>
                        <button type="button" style="width: 45%; margin-top: 2PX; background: #AF7AC5;" class="btn btn-primary" onclick="incrementar()"> + </button>
                        <button type="button" style="width: 45%; margin-top: 2PX; background: #FF7514; font-size: 14px;" class="btn btn-primary" onclick="decrementar()"> -</a> </button>
                      </div>
                      <div class="col-sm-4">
                      <button type="button" style="width: 100%; margin-top: 20PX; border-radius: 15PX; background: #AF7AC5; font-size: 14px;" class="btn btn-primary" onclick="mostrar()"> AGREGAR </button>

                    </div>               
                      </div>
                    </div >
                        <div class="form-group" id="ingredientes1" style="margin-top:0px; margin-bottom: 0px;">
                  <div class="row">    
                   <div class="col-sm-12" align="center"> 
                    <div align="center">
                      <?php 
                      //consulta para imagen y nombre del menu
                          $db6= Conexion::StartUp();     
                           $select6=$db6->query("SELECT nombreMenu, imagenMenu FROM menu WHERE menu.idMenu='$idingrediente'") ?>
                           
                    
                        <?php  while($row6 =$select6->fetch(PDO::FETCH_OBJ)){ 
                    $nombreMenu2=$row6->nombreMenu;
                   $imagenMenu=$row6->imagenMenu;
                   ?> 

                   <label for="imagen"  class="control-label" style="text-align: center; font-size: 18px;"><?php echo $nombreMenu2 ?></label>
                    <table border="1" style="width: 186PX;">
                <tbody>
                <tr>
                <td style="height: 200px " colspan="2" id="previewModificar"><img src="<?php echo "../../img/".$imagenMenu ?>" style= "width: 186px; height: 194px;"></td>
                </tr>
                </tbody>
                </table>  
                   <?php}?>   

                    </div>
              <h1 style="font-size: 18px">INGREDIENTES </h1>
                    
<?php
//incluye la clase Libro y CrudLibro
require_once('../controlador/crudDetalleMenu.php');
require_once('../modelo/detalleMenu.php');
$crud=new CrudDetalleMenu();
$producto= new DetalleMenu();
//obtiene todos los libros con el método mostrar de la clase crud
$listaProductos=$crud->mostrar();



?>
<script type="text/javascript" src="../controlador/productos.js"></script>
<div class="row vertical-align" style="margin-top: -20px ; margin-left: -20px; margin-right: 5px;">
        <div class="col-xs-12 margenes">
        
        <table id="tableUserList" style=" border-radius: -20px;" class="table table-bordered  table-responsive margenes ">
    <h2 style="text-align: center; margin-top:none; font-size: 20px" ></h2>
    <thead style=" font-size: 15px; ">
        <tr>
            <th  style="color: white; font-size: 12px; text-align: center" data-label="id">Id</th>
            <!--<th  style="color: white; font-size: 12px;text-align: center"data-label="Nombre Usuario"colspan="2">Menu </th>-->
            <th  style="color: white;font-size: 15px;text-align: center" colspan="4" data-label="Acciones">Producto</th>
            <th  style="color: white;font-size: 15px;text-align: center" colspan="1" data-label="Acciones">Cantidad</th>
            
            <th  style="color: white;font-size: 15px;text-align: center" colspan="3" data-label="Acciones">Acciones</th>
        </tr>
    </thead>
    <tbody>

  <?php 

//consulta para detalle menu 
                           $db56= Conexion::StartUp();     
                           $select56=$db56->query("SELECT detalleMenu.idDetalleMenu as idDetalleMenu, menu.NombreMenu as idMenu, producto.nombreProducto as idStock, detalleMenu.cantidadDetalleMenu as cantidadDetalleMenu FROM menu, stock, producto, detalleMenu WHERE menu.idMenu=detallemenu.idMenu and detallemenu.idMenu='$idingrediente' and producto.idProducto=stock.idProducto and stock.idStock=detallemenu.idStock GROUP BY (idStock)"); ?>
                           
                    
                        <?php  while($row56 =$select56->fetch(PDO::FETCH_OBJ)){ 
                    $idD=$row56->idDetalleMenu;
                   $idM=$row56->idMenu;
                   $idS=$row56->idStock;
                   $cantDM=$row56->cantidadDetalleMenu;
                   ?>    
                 
                
 
        <tr>
            <td data-label="id" style="font-size: 18PX" id="idp"><?php echo $idD?></td>
            <!--<td data-label="Nombre  del Producto" colspan="2" style="font-size: 18PX"><?php echo $idM?></td>-->
            <td data-label="tipo de Producto"colspan="4 " style="font-size: 18PX"><?php echo $idS ?></td>
            <td data-label="Unidad de Medida"colspan="1" style="font-size: 18PX"><?php echo $cantDM ?></td>
           
                <td data-label="Opciones" colspan="3" align="center">
                  <button class="btn btn-info btn-xs tboton" onclick=""> <span class="glyphicon glyphicon-edit">Modificar </span></button>
            
                          <button class="btn btn-danger btn-xs tboton" ><span class="glyphicon glyphicon-remove">Eliminar</span></button>

           </td>
        </tr>
        <?php    
      } 
    }?>
    </tbody>
</table>
                                
                  
                     
               </div>
                    </div>