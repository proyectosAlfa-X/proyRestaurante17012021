    

<?php

//incluye la clase Libro y CrudLibro
    require_once('../controlador/crudStock.php');
require_once('../modelo/stock.php');
require_once('../../conexion/conexion2.php');
    $crud = new CrudStock();
    $stock = new Stock();
    //busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
    $stock=$crud->obtenerStock($_POST['idStock']);
?>
<script type="text/javascript" src="../controlador/stock.js"></script>
 <div class="container">
   <div class="row vertical-align ">
    <div class="col-xs-10 margenes">
  <div class="panel-body">


                    <div class="form-group"  style="margin-top: 0px; margin-bottom: 0px;">
                    <div class="row">
                        
                        <input type='hidden' name='idStock' id='idStock_ed' value='<?php echo $stock->getIdStock()?>'>

                        <div class="col-sm-4">
                        <label for="TipodeProducto"  class=" control-label" style="color: purple">Producto</label>
                      <div style="border-color: #8E44AD; border-width: 1px;
   border-style: solid; width: 100%;background-color: #F4ECF7;border-radius: 20px;" align="center">
                        <?php 
                           $db2= Conexion::StartUp();     
                           $db22= Conexion::StartUp();     
                           $prod=$stock->getIdProducto();
                           $select11=$db22->query("SELECT * FROM producto  where idProducto ='$prod'"); 
                           $select1=$db2->query("SELECT * FROM producto  where estadoProducto='A' and idProducto!='$prod'");?>


                           
                           <SELECT  id="idProducto_ed"  placeholder="*PRODUCTO" required="required" class="" name='idProducto_ed'   style="height: 18px;  background-color: #F5EEF8; margin: none; border:none; width: 93%">
                            <?php  while($row12 =$select11->fetch(PDO::FETCH_OBJ)){ 
                    $codP=$row12->idProducto;
                    $coddP=$row12->nombreProducto;
                    ?>

                   <option  value="<?php echo $codP ?>" > <?php echo $coddP ?></option>  
                   <?php
                 }
                   ?>
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
                        <div class="col-sm-4">   
                        <label for="sucursal" class=" control-label"style="color: purple">Sucursal</label>
                         <div style="border-color: #8E44AD; border-width: 1px;
   border-style: solid; width: 100%;background-color: #F4ECF7;border-radius: 20px;" align="center">
                        <?php 

                           $db4= Conexion::StartUp();     
                           $db44= Conexion::StartUp();   
                           $idS=$stock->getIdSucursal();  
                           $select33=$db44->query("SELECT * FROM sucursal where estadoSucursal='A' and idSucursal='$idS' ");
                           $select3=$db4->query("SELECT * FROM sucursal where estadoSucursal='A' and idSucursal!='$idS'");  ?>
                           <SELECT  id="idSucursal_ed" placeholder="*TIPO DE PRODUCTO" required="required" class="" name='idSucursal_ed' style="height: 18px;  background-color: #F5EEF8; margin: none; border:none; width: 93%">


                             <?php  while($row22 =$select33->fetch(PDO::FETCH_OBJ)){ 
                    $codSuc=$row22->idSucursal;
                   $desS=$row22->NombreSucursal;
                   ?>    
                 <option  value="<?php echo $codSuc; ?> "> <?php echo $desS; ?></option>
                <?php  }
                  ?>
                    
                        <?php  while($row1 =$select3->fetch(PDO::FETCH_OBJ)){ 
                    $codS=$row1->idSucursal;
                   $descS=$row1->NombreSucursal;
                   ?>    
                 <option  value="<?php echo $codS; ?> "> <?php echo $codS.$descS; ?></option>
                <?php  }
                  ?>
                    </select>
                    </div>
                        </div>
                        <div class="col-sm-4" style="margin-left: 0px" >
                        
                         <label for="fingreso" class=" control-label" style="color: purple">fecha de Ing. Sucursal</label>
                      <input type="date" style="font-size: 13px" class="form-control colorInput estilord desbloquea" required="required" id="fechaIngresoSucursal_ed" name='fechaIngresoSucursal_ed' placeholder="*FECHA DE INGRESO" value="<?php echo $stock->getFechaIngresoSucursal()?>">
                    </div>

                           
                        </div>
                    </div>
                
                    <div class="form-group" style="margin-top: 0px; margin-bottom: 0px;">
                         <div class="row">
                        
                        <div class="col-sm-4">
                       <label for="fvencimiento" class=" control-label"style="color: purple">Descripcion</label>
                      <input type="text" class="form-control colorInput estilord " required="required"  id='descripcionStock_ed' name='descripcionStock_ed' placeholder="*DESCRIPCION" value="<?php echo $stock->getDescripcionStock() ?>">
                        </div>
                        <div class="col-sm-4">
                     <label for="estado" class=" control-label"style="color: purple">Estado</label>
                      <input type="text" class="form-control colorInput estilord" required="required"  id="estadoStock_ed" name='estadoStock_ed' placeholder="*ESTADO" value="<?php echo $stock->getEstadoStock()?>">
                    </div>
                    <div class="col-sm-4">
                     <label for="costo" class=" control-label"style="color: purple">Cantidad</label>
                        <input type="text" class="form-control estilord" required="required" id='cantidad_ed' name='cantidad_ed' placeholder="*COSTO PRODCUTO" value="<?php echo $stock->getCantidad() ?>">
                        </div>
                         </div>
                    </div>
                   

 </div>
    </div>

   <div class="col-xs-10" style="margin-left: 0px">
                <div class="form-group" style="margin-top: 0px">
                    <div class="col-sm-6" style="margin-top: -5px" align="center" >
                    <label for="imagen"  class="col-sm-6 control-label" style="text-align: center;">Imagen</label>
                    <table border="1" style="width: 186PX;">
                <tbody>
                <tr>

                     
                      

                 <td style="height: 200px " colspan="2" id="previewModificar"><div id="hola2"><img style="width: 95%; height: 90%" src="<?php echo "../../".$stock->getImagenProducto() ?>">  </div> </td>
                   </tr>
                </tbody>
                </table>    
            </div>
        </div>
        
        </div>
        </div> 
        </div>
</body>
</html>