

<?php

//incluye la clase Libro y CrudLibro
    require_once('../controlador/crudProducto.php');
require_once('../modelo/producto.php');
    $crud = new CrudProducto();
    $producto = new Producto();
    //busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
    $producto=$crud->obtenerProducto($_POST['idProducto']);
?>
<script type="text/javascript" src="../controlador/productos.js"></script>
 <div class="container">
   <div class="row vertical-align ">
    <div class="col-xs-10 margenes">
  <div class="panel-body">


                    <div class="form-group"  style="margin-top: 0px; margin-bottom: 0px;">
                    <div class="row">
                        
                        <input type='hidden' name='idProducto' id='idProducto_ed' value='<?php echo $producto->getIdProducto()?>'>

                        <div class="col-sm-4">
                        <label for="name" class=" control-label bordesredondos" style="height: 5px; color: purple">Nombre</label>
                            <input type="text" class="form-control colorInput2 estilord"  name='nombreProducto' id='nombreProducto_ed' value='<?php echo $producto->getNombreProducto()?>' placeholder="NombreProdcuto" >
                        </div>
                        <div class="col-sm-4">   
                        <label for="TipoProducto"  class=" control-label bordesredondos" style=" height: 5px; color: purple">Tipo de Producto</label>
                            <input type="text" class="form-control colorInput2 estilord"  name='idTipoProducto' id='idTipoProducto_ed' value='<?php echo $producto->getIdTipoProducto()?>' placeholder="Tipo de Producto">
                        </div>
                        <div class="col-sm-4" >
                        <label for="unidadMedida" class=" control-label bordesredondos" style="height: 5px; color: purple">Unidad de Medida</label>
                            <input type="text" class="form-control estilord" name='idUnidadMedida' id='idUnidadMedida_ed' value='<?php echo $producto->getIdUnidadMedida()?>' placeholder="unidadMedida">
                        </div>
                    </div>
                </div>
                    <div class="form-group" style="margin-top: 0px; margin-bottom: 0px;">
                         <div class="row">
                        
                        <div class="col-sm-4">
                        <label for="fechaIngresoProducto" class=" control-label bordesredondos" style="height: 5px; color: purple">fecha de Ingreso</label>
                            <input type="text" class="form-control colorInput estilord" name='fechaIngresoProducto' id='fechaIngresoProducto_ed' value='<?php echo $producto->getFechaIngresoProducto()?>' placeholder="Fecha de Ingreso Producto">
                        </div>
                        <div class="col-sm-4">
                    <label for="fechaVencimientoProducto" class=" control-label bordesredondos" style="height: 5px; color: purple">Fecha de Vencimiento</label>
                    <input type="text" class="form-control colorInput estilord"  name='fechaVencimientoProducto' id='fechaVencimientoProducto_ed' value='<?php echo $producto->getFechaVencimientoProducto()?>' placeholder="Fecha de Vencimiento">
                    </div>
                    <div class="col-sm-4">
                    <label for="estadoProducto" class=" control-label bordesredondos" style="height: 5px; color: purple">Estado</label>
                    <input type="text" class="form-control estilord" name='estadoProducto' id='estadoProducto_ed' value='<?php echo $producto->getEstadoProducto()?>' placeholder="Estado del Producto">
                        </div>
                         </div>
                    </div>
                    <div class="form-group"style="margin-top: 0px; margin-bottom: 0px;">
                         <div class="row">
                        <div class="col-sm-4">
                        <label for="sucursal" class=" control-label bordesredondos" style="height: 5px; color: purple">Sucursal</label>
                            <input type="text" class="form-control estilord" name='idSucursal' id='idSucursal_ed' value='<?php echo $producto->getIdSucursal()?>' placeholder="Sucursal">
                        </div>
                        <div class="col-sm-4">
                        <label for="costoProducto" class=" control-label bordesredondos" style="height: 5px; color: purple">Costo del Producto</label>
                            <input type="text" class="form-control estilord"  name='costoProducto' id='costoProducto_ed' value='<?php echo $producto->getCostoProducto()?>' placeholder="Costo del Producto">
                        </div>
                        <div class="col-sm-4">
                        <label for="stockProducto" class="control-label bordesredondos" style="height: 5px; color: purple">Stock</label>
                        <input type="text" class="form-control colorInput estilord" name='stockProducto' id='stockProducto_ed' value='<?php echo $producto->getStockProducto()?>' placeholder="Stock/Existencia">
                        </div>
                         </div>
                    </div>
                    <div class="form-group"style="margin-top: 0px; margin-bottom: 0px;">
                         <div class="row">
                        <div class="col-sm-12">
                       <LABEL class="control-label formatoTextoL">IMAGEN </LABEL>
                    <input type="file" enctype="multipart/form-data"  id="imagen2" placeholder="*IMAGEN"required="required" class="filestyle"  data-buttonName="btn-primary" style="background-color: #e2f0fb;">
                	</div>
                	
                      </div>
                </div>

 </div>
    </div>

   <div class="col-xs-10" style="margin-left: 0px">
                <div class="form-group" style="margin-top: 0px">
                    <div class="col-sm-6" style="margin-top: -5px" align="center" >
                    <label for="imagen"  class="col-sm-6 control-label" style="text-align: center;">Imagen</label>
                    <table border="1" style="width: 70%;">
                <tbody>
                <tr>
                <td style="height: 200px" colspan="2"></td>
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