

<?php
//incluye la clase Libro y CrudLibro
require_once('../controlador/crudMenu.php');
require_once('../modelo/menu.php');
$crud=new CrudMenu();
$producto= new Menu();
//obtiene todos los libros con el método mostrar de la clase crud
$listaProductos=$crud->mostrar();
?>
<script type="text/javascript" src="../controlador/productos.js"></script>
<div class="row vertical-align" style="margin-top: -20px ; margin-left: -20px; margin-right: 5px;">
        <div class="col-xs-12 margenes">
        
        <table id="tableUserList" style=" border-radius: -20px;" class="table table-bordered  table-responsive margenes ">
    <h2 style="text-align: center; margin-top:none; font-size: 20px" >Datos del Producto</h2>
    <thead style=" font-size: 15px; ">
        <tr>
            <th  style="color: white; font-size: 12px; text-align: center" data-label="id">Id</th>
            <th  style="color: white; font-size: 12px;text-align: center"data-label="Nombre Usuario"colspan="2">Tipo de Menu </th>
            <th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Nombre</th>
            <th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Descripcion</th>
            <th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Estado </th>
            <th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Precio (Q)</th>
            <th  style="color: white;font-size: 15px;text-align: center" colspan="4" data-label="Acciones">Acciones</th>
        </tr>
    </thead>
    <tbody>
 <?php foreach ($listaProductos as $producto) {?>
 
        <tr>
            <td data-label="id" style="font-size: 18PX" id="idp"><?php echo $producto->getIdMenu() ?></td>
            <td data-label="Nombre  del Producto" colspan="2" style="font-size: 18PX"><?php echo $producto->getIdTipoMenu() ?></td>
            <td data-label="tipo de Producto"colspan="2" style="font-size: 18PX"><?php echo $producto->getNombreMenu() ?></td>
            <td data-label="Unidad de Medida"colspan="2" style="font-size: 18PX"><?php echo $producto->getDescripcionMenu() ?></td>
            <td data-label="Fecha de Ingreso Producto"colspan="2" style="font-size: 18PX"><?php echo $producto->getEstadoMenu() ?></td>
            <td data-label="Estado"colspan="2" style="font-size: 18PX"><?php echo $producto->getPrecioVentaMenu()?> </td>

              <td data-label="Opciones" colspan="4" align="center">
          <!-- 
                 	<button class="btn btn-info btn-xs tboton" data-toggle="modal" data-target="#myModal" onclick=""> <span class="glyphicon glyphicon-edit">Modificar </span></button>
            
                         	<button class="btn btn-danger btn-xs tboton"  data-toggle="modal" data-target="#myModalEliminar" onclick="" ><span class="glyphicon glyphicon-remove">Eliminar</span></button>

                          <button class="btn btn-primary btn-xs tboton"  data-toggle="modal" data-target="#myModalTraslado" onclick="" ><span class="glyphicon glyphicon-remove">Trasladar</span></button>-->
                          

                          <button class="btn btn-warning btn-ms tboton"  data-toggle="modal" data-target="#myModalIngredientes" onclick="btn_ingredientes('<?php echo $idIngrediente= $producto->getIdMenu();?>');"><span class="glyphicon glyphicon-remove">Agregar Ingredientes</span></button> 
            </td>
        </tr>
        <?php     }?>
    </tbody>
</table>
</div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg tmodal ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #AF7AC5;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
<script type ="text/javascript" src="../controlador/producto.js"></script>
        <!--aqui formulario bootstrap de actualizacion-->
        <div id="panel_editar"></div>
        <div id="panel_respuesta_edicion"></div>
       
            
           
    
      </div>
      <div class="modal-footer" style="background: #F8781D;">

        <button type="button" class="btn btn-primary btn-sm" onclick="btn_guardar_edicion();">GUARDAR <i class="fa fa-save"></i></button>
          <button type="button" class="btn btn-success btn-sm">MODIFICAR <i class="fa fa-pencil-square-o"></i></button>
            <button type="button" class="btn btn-warning btn-sm">BUSCAR <i class="fa fa-search"></i></button>
           <button type="button" class="btn btn-danger btn-sm">ELIMINAR <i class="fa fa-trash"></i></button>
        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
      </div>
    

  </div>
</div>
</div>
</div>


<!-- Modal Eliminar-->

<!-- Modal -->
<div id="myModalEliminar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg tmodal ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #AF7AC5;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
    </div>
      <div class="modal-body">
<script type ="text/javascript" src="../controlador/producto.js"></script>
        <!--aqui formulario bootstrap de actualizacion-->
        <div id="panel_eliminar"></div>
         <div id="panel_respuesta_eliminar"></div>
       
            
           
    
      </div>
      <div class="modal-footer" style="background: #F8781D;">

          <button type="button" class="btn btn-primary btn-sm" onclick="btn_guardar_eliminar();">CONFIRMAR <i class="fa fa-save"></i></button>
          <button type="button" class="btn btn-success btn-sm">MODIFICAR <i class="fa fa-pencil-square-o"></i></button>
            <button type="button" class="btn btn-warning btn-sm">BUSCAR <i class="fa fa-search"></i></button>
           <button type="button" class="btn btn-danger btn-sm">ELIMINAR <i class="fa fa-trash"></i></button>
        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
      </div>
    

  </div>
</div>
</div>
</div>

<!-- Modal -->
<div id="myModalTraslado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg tmodal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #AF7AC5;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
<script type ="text/javascript" src="../controlador/producto.js"></script>
        <!--aqui formulario bootstrap de actualizacion-->
        <div id="panel_trasladar"></div>
        <div id="panel_respuesta_Traslado"></div>
       
            
           
    
      </div>
      <div class="modal-footer" style="background: #F8781D;">

        <button type="button" class="btn btn-primary btn-sm" onclick="btn_guardar_Traslado();">GUARDAR <i class="fa fa-save"></i></button>
          <button type="button" class="btn btn-success btn-sm">MODIFICAR <i class="fa fa-pencil-square-o"></i></button>
            <button type="button" class="btn btn-warning btn-sm">BUSCAR <i class="fa fa-search"></i></button>
           <button type="button" class="btn btn-danger btn-sm">ELIMINAR <i class="fa fa-trash"></i></button>
        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
      </div>
    

  </div>
</div>
</div>
</div>


<!-- Modal -->
<div id="myModalIngredientes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg tmodal ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #AF7AC5;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
    </div>
      <div class="modal-body">
<script type ="text/javascript" src="../controlador/food.js"></script>
        <!--aqui formulario bootstrap de actualizacion-->
        <div id="panel_ingredientes"></div>
         <div id="panel_respuesta_ingredientes"></div>
       
            
           
    
      </div>
      <div class="modal-footer" style="background: #F8781D;">

          <button type="button" class="btn btn-primary btn-sm" onclick="btn_guardar_eliminar();">CONFIRMAR <i class="fa fa-save"></i></button>
          <button type="button" class="btn btn-success btn-sm">MODIFICAR <i class="fa fa-pencil-square-o"></i></button>
            <button type="button" class="btn btn-warning btn-sm">BUSCAR <i class="fa fa-search"></i></button>
           <button type="button" class="btn btn-danger btn-sm">ELIMINAR <i class="fa fa-trash"></i></button>
        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
      </div>
    

  </div>
</div>
</div>
</div>





  