

<?php
//incluye la clase Libro y CrudLibro
require_once('../controlador/crudStock.php');
require_once('../../conexion/conexion2.php');
require_once('../modelo/stock.php');


$codUso = $_SESSION["codUsuario"];
$codS1 = $_SESSION["codSucursal"];
$crud=new CrudStock();
$stock= new Stock();
//obtiene todos los libros con el método mostrar de la clase crud
$listaStock=$crud->mostrar();

require('../modelo/config.php');
    $connexion=Conexion::StartUp();
$result = $connexion->query('SELECT COUNT(*) as total_products FROM stock WHERE estadoStock = "A"');
$row = $result->fetch(PDO::FETCH_OBJ);
$num_total_rows = $row->total_products;
?>
<body>
    <?php

    if ($num_total_rows > 0) {
    $num_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);
    $connexion=Conexion::StartUp();
    $result = $connexion->query(
        'SELECT * FROM stock 
        WHERE estadoStock="A" 
        ORDER BY idStock DESC 
        LIMIT 0, '.NUM_ITEMS_BY_PAGE);
    if ($result->rowCount() > 0) {
       echo '<ul class="row items">';

echo'<script type="text/javascript" src="../controlador/stock.js"></script>';
echo'<div class="row vertical-align" style="margin-top: -20px ; margin-left: -20px; margin-right: 5px;">';
        echo'<div class="col-xs-12 margenes">';
        
        echo'<table id="tableUserList" style=" border-radius: -20px;" class="table table-bordered table-responsive margenes ">';
    echo'<h2 style="text-align: center; margin-top:none; font-size: 20px" >Datos del Producto</h2>
    <thead style=" font-size: 15px; ">';
        echo'<tr>';
            echo'<th  style="color: white; font-size: 12px; text-align: center" data-label="id">Id</th>';
            echo'<th  style="color: white; font-size: 12px;text-align: center"data-label="Nombre Usuario"colspan="2">Producto </th>';
            echo'<th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Sucursal</th>';
            echo'<th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Fecha de Ingreso</th>';
            echo'<th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Descripcion </th>';
            echo'<th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Estado</th>';
            echo'<th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Unidad Disponible</th>';
            echo'<th  style="color: white;font-size: 15px;text-align: center" colspan="4" data-label="Acciones">Accion</th>';
            
        echo'</tr>';
     
    echo'</thead>';
echo'<tbody>';
        while ($row11 = $result->fetch(PDO::FETCH_OBJ)) {

            echo '<div class="item">';
        echo '<tr>';
            echo '<td data-label="id" id="idp"style="font-size: 16PX; text-align: center;">'. $row11->idStock.'</td>';
            echo '<td style="font-size: 16PX; text-align: center;" data-label="Nombre  del Producto" colspan="2">'.$row11->idProducto.'</td>';
            echo '<td style="font-size: 16PX; text-align: center;" data-label="tipo de Producto"colspan="2">'.$row11->idSucursal.'</td>';
            echo '<td style="font-size: 16PX; text-align: center;" data-label="Unidad de Medida"colspan="2">'.$row11->fechaIngresoSucursal.'</td>';
            echo '<td style="font-size: 16PX; text-align: center;" data-label="Fecha de Ingreso Producto"colspan="2">'.$row11->descripcionStock .'</td>';
            
            echo '<td style="font-size: 16PX; text-align: center;" data-label="Estado"colspan="2">'. $row11->estadoStock.' </td>';
            echo '<td style="font-size: 16PX; text-align: center;" data-label="Costo"colspan="2">'.$row11->cantidad.'</td>';
           echo '<td  data-label="Opciones" colspan="4" style=" text-align: center;">';
                 echo '	<button class="btn btn-info btn-xs tboton" data-toggle="modal" data-target="#myModal" onclick="btn_editar('.$idProducto=$row11->idStock.');"> <span class="glyphicon glyphicon-edit">Modificar </span></button>';
            
  

                       echo '  	<button class="btn btn-danger btn-xs tboton"  data-toggle="modal" data-target="#myModalEliminar" onclick="btn_eliminar('.$idProducto=$row11->idStock.');" ><span class="glyphicon glyphicon-remove">Eliminar</span></button>';

                          echo '<button class="btn btn-primary btn-xs tboton"  data-toggle="modal" data-target="#myModalTraslado" onclick="btn_trasladar('.$idProducto=$row11->idStock.');" ><span class="glyphicon glyphicon-remove">Trasladar</span></button>';
            echo '</td>';
        echo '</tr>';
      }
        echo '</tbody>';
echo '</table>';
       echo '</div>';
   echo '</ul>'; 
      
      }

?>

    
<?php
if ($num_pages > 1) {
        echo '<div class="row">';
        echo '<div class="col-lg-12">';
        echo '<nav aria-label="Page navigation example">';
        echo '<ul class="pagination justify-content-end">';
 
        for ($i=1;$i<=$num_pages;$i++) {
            $class_active = '';
            if ($i == 1) {
                $class_active = 'active';
            }
            echo '<li class="page-item '.$class_active.'"><a style="z-index:1;" class="page-link" href="#" data="'.$i.'">'.$i.'</a></li>';
        }
 
        echo '</ul>';
        echo '</nav>';
        echo '</div>';
        echo '</div>';
    }
}

         
      ?>
</body>

<script type="text/javascript">
$(document).ready(function() {  
    $('.pagination li a').on('click', function(){
        $('.items').html('<div class="loading"><img src="images/loading.gif" width="70px" height="70px"/><br/>Un momento por favor...</div>');
 
        var page = $(this).attr('data');    
        var dataString = 'page='+page;
 
        $.ajax({
            type: "GET",
            url: "ajax.php",
            data: dataString,
            success: function(data) {
                $('.items').fadeIn(2000).html(data);
                $('.pagination li').removeClass('active');
                $('.pagination li a[data="'+page+'"]').parent().addClass('active');
            }
        });
        return false;
    });              
});    
</script>



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