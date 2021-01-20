
<?php

//incluye la clase Libro y CrudLibro
    require_once('../controlador/crudProducto.php');
require_once('../modelo/producto.php');
    $crud = new CrudProducto();
    $producto = new Producto();
    //busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
    $producto=$crud->obtenerProducto($_POST['idProducto']);
?>
 <div class="container">
   <div class="row vertical-align voy">
    <div class="col-xs-10 margenes">
  <div class="panel-body">

       <form class="form-horizontal company" role="form" action='../modelo/administrarProducto.php' method='post'>
                    <div class="form-group"  style="margin-top: 0px; margin-bottom: 0px;">
                    <div class="row">
                        <div class="col-sm-4">
                        <input type='hidden' name='idProducto' id="idProducto_d" value='<?php echo $producto->getIdProducto()?>'>

                        <label for="name" class=" control-label bordesredondos" style="height: 5px; color: purple">Nombre</label>
                            <input type="text" class="form-control colorInput2 estilord"  name='nombreProducto' value='<?php echo $producto->getNombreProducto()?>' placeholder="NombreProdcuto" >
                        </div>
                        <div class="col-sm-4">   
                        <label for="TipoProducto"  class=" control-label" style="color: purple">Tipo de Producto</label>
                            <input type="text" class="form-control colorInput2 estilord"  name='idTipoProducto' value='<?php echo $producto->getIdTipoProducto()?>' placeholder="Tipo de Producto">
                        </div>
                        <div class="col-sm-4" >
                        <label for="unidadMedida" class=" control-label" style="color: purple">Unidad de Medida</label>
                            <input type="text" class="form-control estilord" name='idUnidadMedida' value='<?php echo $producto->getIdUnidadMedida()?>' placeholder="unidadMedida">
                        </div>
                    </div>
                </div>
                    <div class="form-group" style="margin-top: 0px; margin-bottom: 0px;">
                         <div class="row">
                        
                        <div class="col-sm-4">
                        <label for="fechaIngresoProducto" class=" control-label" style="color: purple">fecha de Ingreso</label>
                            <input type="text" class="form-control colorInput estilord" name='fechaIngresoProducto' value='<?php echo $producto->getFechaIngresoProducto()?>' placeholder="Fecha de Ingreso Producto">
                        </div>
                        <div class="col-sm-4">
                    <label for="fechaVencimientoProducto" class=" control-label"style="color: purple">Fecha de Vencimiento</label>
                    <input type="text" class="form-control colorInput estilord"  name='fechaVencimientoProducto' value='<?php echo $producto->getFechaVencimientoProducto()?>' placeholder="Fecha de Vencimiento">
                    </div>
                    <div class="col-sm-4">
                    <label for="estadoProducto" class=" control-label"style="color: purple">Estado</label>
                    <input type="text" class="form-control colorInput estilord" name='estadoProducto' value='<?php echo $producto->getEstadoProducto()?>' placeholder="Estado del Producto">
                        </div>
                         </div>
                    </div>
                    <div class="form-group"style="margin-top: 0px; margin-bottom: 0px;">
                         <div class="row">
                        <div class="col-sm-4">
                        <label for="sucursal" class=" control-label"style="color: purple">Sucursal</label>
                            <input type="text" class="form-control estilord" name='idSucursal' value='<?php echo $producto->getIdSucursal()?>' placeholder="Sucursal">
                        </div>
                        <div class="col-sm-4">
                        <label for="costoProducto" class=" control-label"style="color: purple">Costo del Producto</label>
                            <input type="text" class="form-control estilord"  name='costoProducto' value='<?php echo $producto->getCostoProducto()?>' placeholder="Costo del Producto">
                        </div>
                        <div class="col-sm-4">
                        <label for="stockProducto" class="control-label"style="color: purple">Stock</label>
                        <input type="text" class="form-control colorInput estilord" name='stockProducto' value='<?php echo $producto->getStockProducto()?>' placeholder="Stock/Existencia">
                        </div>
                         </div>
                    </div>
                    <div class="form-group"style="margin-top: 0px; margin-bottom: 0px;">
                         <div class="row">
                        <div class="col-sm-12">
                        <LABEL class="control-label formatoTextoL">IMAGEN </LABEL>

                        <input type="text" class="form-control colorInput estilord" name='imagen4' id="imagen4" value='<?php echo $producto->getImagenProducto()?>' placeholder="Stock/Existencia">
                    <input type="FILE" enctype="multipart/form-data"  id='imagen3' name='imagen3' placeholder="*IMAGEN" value='<?php echo $producto->getImagenProducto()?>' required="required" class="filestyle"  data-buttonName="btn-primary" style="background-color: #e2f0fb;">
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

                </form> 
</body>
</html>