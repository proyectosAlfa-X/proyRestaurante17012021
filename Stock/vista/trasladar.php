
<?php
//incluye la clase Libro y CrudLibro
    require_once('../controlador/crudStock.php');
require_once('../modelo/stock.php');
require_once('../../conexion/conexion2.php');
    $crud = new CrudStock();
    $Stock = new Stock();
    //busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
    $Stock=$crud->obtenerStock($_POST['idStock']);
    $codUso = $_SESSION["codUsuario"];
    $codSl = $_SESSION["codSucursal"];

?>
 <div class="container">
   <div class="row vertical-align">
    <div class="col-xs-10 margenes">
  <div class="panel-body">

      
                   <div class="form-group"  style="margin-top: 0px; margin-bottom: 0px;">
                    <div class="row">
                        
                        <input type='hidden' name='idProducto' id="idStock_d" value='<?php echo $Stock->getIdStock()?>'>
                        <div class="col-sm-4">
                        <label for="name" class=" control-label bordesredondos" style="height: 5px; color: purple">Fecha del Traslado</label>
                            <input type="text" class="form-control colorInput estilord" name='fechaTraslado' value='<?php echo date('Y-m-d'); ?>' placeholder="Fecha de Traslado" id="fechaTraslado">
                        </div>
                        <div class="col-sm-4">   
                        <label for="TipoProducto"  class=" control-label" style="color: purple">Usuario Responsable</label>

                            <div style="border-color: #8E44AD; border-width: 1px;
   border-style: solid; width: 100%;background-color: #F4ECF7;border-radius: 20px;" align="center">
                        <?php 
                           $db5= Conexion::StartUp();  
                           
                           $select5=$db5->query("SELECT * FROM usuario where estadoUsuario='A'  and idUsuario='$codUso'"); ?>
                           <SELECT  id="idUsuarioEnvia" placeholder="*TIPO DE PRODUCTO" required="required" class="" name='idSucursal' style="height: 18px;  background-color: #F5EEF8; margin: none; border:none; width: 93%">
                    
                        <?php  while($row2 =$select5->fetch(PDO::FETCH_OBJ)){ 
                    $codU=$row2->idUsuario;
                   $descU=$row2->usuario;
                   ?>    
                 <option id="idUsuarioEnvia" value="<?php echo $codU; ?> "> <?php echo $descU; ?></option>
                <?php  }
                  ?>
                    </select>
                    </div>

                        </div>
                        <div class="col-sm-4" >
                        <label for="sucursalenvia" class=" control-label" style="color: purple">Sucursal que Envia</label>

                        <div style="border-color: #8E44AD; border-width: 1px;
   border-style: solid; width: 60%;background-color: #F4ECF7;border-radius: 20px;" align="center">
                        <?php 
                           $db4= Conexion::StartUp();  
                           
                           $select3=$db4->query("SELECT * FROM sucursal where estadoSucursal='A' and idSucursal='$codS1'"); ?>
                           <SELECT  id="idSucursalEnvia" placeholder="*TIPO DE PRODUCTO" required="required" class="" name='idSucursal' style="height: 18px;  background-color: #F5EEF8; margin: none; border:none; width: 93%; font-size:12PX;">
                    
                        <?php  while($row1 =$select3->fetch(PDO::FETCH_OBJ)){ 
                    $codS=$row1->idSucursal;
                   $descS=$row1->NombreSucursal;
                   ?>    
                 <option id="idSucursalEnvia" value="<?php echo $codS; ?> "> <?php echo $descS; ?></option>
                <?php  }
                  ?>
                    </select>
                    </div>
                        </div>
                    </div>
                </div>
                    <div class="form-group" style="margin-top: 0px; margin-bottom: 0px;">
                         <div class="row">
                        
                        <div class="col-sm-4">
                        <label for="descripcionProducto" class=" control-label" style="color: purple">Descripcion Producto</label>

                        <div style="border-color: #8E44AD; border-width: 1px;
   border-style: solid; width: 100%;background-color: #F4ECF7;border-radius: 20px;" align="center">
                        <?php 
                           $db4= Conexion::StartUp();  
                           
                           $codPro=$Stock->getIdProducto();
                           
                           $select3=$db4->query("SELECT * FROM producto, tipoProducto, stock where estadoStock='A'and estadoTipoProducto='A' and estadoProducto='A' and stock.idProducto='$codPro' and tipoProducto.idTipoProducto=producto.idTipoProducto and producto.idProducto=stock.idProducto"); ?>
                           <SELECT  id="descripcionProductoT" placeholder="*TIPO DE PRODUCTO" required="required" class="" name='idSucursal' style="height: 18px;  background-color: #F5EEF8; margin: none; border:none; width: 93%; font-size: 12px">
                    
                        <?php  while($row1 =$select3->fetch(PDO::FETCH_OBJ)){ 
                    $codS=$row1->idProducto;
                   $descS=$row1->nombreProducto;
                   $descTp=$row1->descripcionTipoProducto;
                   ?>    
                 <option id="descripcionProductoT" value="<?php echo $codS; ?> "> <?php echo $descTp."-".$descS; ?></option>
                <?php  }
                  ?>
                    </select>
                    </div>

                        </div>
                        <div class="col-sm-4">
                    <label for="sucursalRecibe" class=" control-label"style="color: purple">Sucursal Recibe</label>

                      <div style="border-color: #8E44AD; border-width: 1px;
   border-style: solid; width: 100%;background-color: #F4ECF7;border-radius: 20px;" align="center">
                        <?php 
                           $db4= Conexion::StartUp();  
                           $sucut=$Stock->getIdSucursal();   
                           $select3=$db4->query("SELECT * FROM sucursal where estadoSucursal='A' and idSucursal!='$sucut'"); ?>
                           <SELECT  id="idSucursalRecibe" placeholder="*TIPO DE PRODUCTO" required="required" class="" name='idSucursal' style="height: 18px;  background-color: #F5EEF8; margin: none; border:none; width: 93%; font-size: 09PX; font-weight: bold;">
                    
                        <?php  while($row1 =$select3->fetch(PDO::FETCH_OBJ)){ 
                    $codS=$row1->idSucursal;
                   $descS=$row1->NombreSucursal;
                   ?>    
                 <option id="idSucursalRecibe" value="<?php echo $codS; ?> "> <?php echo $descS; ?></option>
                <?php  }
                  ?>
                    </select>
                    </div>
                    </div>

                    <div class="col-sm-2">
                    <label for="estadoProducto" class=" control-label"style="color: purple">Estado</label>
                    <input type="text" class="form-control colorInput estilord" name='estadoProducto' value="<?php echo $Stock->getEstadoStock();?>" placeholder="Estado del Producto" id="estadoTraslado">
                        </div>
                         </div>
                    </div>

                    <div class="form-group"style="margin-top: 0px; margin-bottom: 0px;">
                         <div class="row">
                        <div class="col-sm-4">
                        <label for="sucursal" class=" control-label"style="color: purple">Descripcion Traslado</label>
                            <input type="text" class="form-control estilord" name='idSucursal' value='' placeholder="*Descripcion" id="descripcionT">
                        </div>
                        <div class="col-sm-4">
                        <label for="costoProducto" class=" control-label"style="color: purple">Cantidad a trasladar</label>
                            <input type="text" class="form-control estilord"  name='costoProducto' value='' placeholder="*Cantidad" id="cantidadTraslado">
                        </div>
                         </div>
                    </div>
                    
        
        </div>
        </div> 
        </div>

                
</body>
</html>