

<?php



require_once('../modelo/config.php');
require_once('../../conexion/conexion2.php');
include("../../login/verificaInicioSesion.php");//llamar en todas las paginas
$codUso = $_SESSION["codUsuario"];
$codS1 = $_SESSION["codSucursal"];

$html = '';




$page = $_GET['page'];
$rowsPerPage = NUM_ITEMS_BY_PAGE;
$offset = ($page - 1) * $rowsPerPage;
sleep(1);
 $conexion=Conexion::StartUp();
$result = $conexion->query(
    "SELECT stock.idStock as 'idStock',
                     producto.nombreProducto as 'idProducto',
                     sucursal.NombreSucursal as 'idSucursal',
                     stock.fechaIngresoSucursal as 'fechaIngresoSucursal',
                     stock.descripcionStock as 'descripcionStock',
                     stock.estadoStock as 'estadoStock',
                     stock.cantidad as 'cantidad' FROM stock, sucursal, producto WHERE estadoStock='A' and producto.idProducto=stock.idProducto and sucursal.idSucursal=stock.idSucursal and stock.idSucursal='$codS1' ORDER BY stock.idStock DESC  LIMIT ".$offset.", ".$rowsPerPage);
if ($result->rowCount() > 0) {
    $html.='<script type="text/javascript" src="../controlador/stock.js"></script>';
    $html .= '<div class="item">';
$html.='<div class="row vertical-align" style="margin-top: -20px ; margin-left: -20px; margin-right: 5px;">';
        $html.='<div class="col-xs-12 margenes">';
        
        $html.='<table id="tableUserList" style=" border-radius: -20px;" class="table table-bordered table-responsive margenes ">';
    $html.='<h2 style="text-align: center; margin-top:none; font-size: 20px" >Datos del Producto</h2>
    <thead style=" font-size: 15px; ">';
        $html.='<tr>';
            $html.='<th  style="color: white; font-size: 12px; text-align: center" data-label="id">Id</th>';
            $html.='<th  style="color: white; font-size: 12px;text-align: center"data-label="Nombre Usuario"colspan="2">Producto </th>';
            $html.='<th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Sucursal</th>';
            $html.='<th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Fecha de Ingreso</th>';
           $html.='<th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Descripcion </th>';
            $html.='<th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Estado</th>';
            $html.='<th  style="color: white;font-size: 15px;text-align: center" colspan="2" data-label="Acciones">Unidad Disponible</th>';
            $html.='<th  style="color: white;font-size: 15px;text-align: center" colspan="4" data-label="Acciones">Accion</th>';
            
        $html.='</tr>';
     
    $html.='</thead>';
$html.='<tbody>';

    while ($row = $result->fetch(PDO::FETCH_OBJ)) {
        
         $html .= '<tr>';
            $html .= '<td data-label="id" id="idp"style="font-size: 16PX; text-align: center;">'. $row->idStock.'</td>';
            $html .= '<td style="font-size: 16PX; text-align: center; color:black;" data-label="Nombre  del Producto" colspan="2">'. $row->idProducto.'</td>';
            $html .= '<td style="font-size: 16PX; text-align: center;" data-label="tipo de Producto"colspan="2">'. $row->idSucursal.'</td>';
            $html .=  '<td style="font-size: 16PX; text-align: center;" data-label="Unidad de Medida"colspan="2">'. $row->fechaIngresoSucursal.'</td>';
            $html .= '<td style="font-size: 16PX; text-align: center;" data-label="Fecha de Ingreso Producto"colspan="2">'.$row->descripcionStock.'</td>';
            
            $html .= '<td style="font-size: 16PX; text-align: center;" data-label="Estado"colspan="2">'.$row->estadoStock.'</td>';
            $html .= '<td style="font-size: 16PX; text-align: center;" data-label="Costo"colspan="2">'.$row->cantidad.'</td>';
           $html .=  '<td  data-label="Opciones" colspan="4" style=" text-align: center;">
                  <button class="btn btn-info btn-xs tboton" data-toggle="modal" data-target="#myModal" onclick="btn_editar('.$idStock=$row->idStock.');"> <span class="glyphicon glyphicon-edit">Modificar </span></button>';
            
                       $html .= '   <button class="btn btn-danger btn-xs tboton"  data-toggle="modal" data-target="#myModalEliminar" onclick="btn_eliminar('.$idStock=$row->idStock.');" ><span class="glyphicon glyphicon-remove">Eliminar</span></button>';

                          $html .= '<button class="btn btn-primary btn-xs tboton"  data-toggle="modal" data-target="#myModalTraslado" onclick="btn_trasladar('.$idStock=$row->idStock.');" ><span class="glyphicon glyphicon-remove">Trasladar</span></button>';
            $html .=  '</td>';
        $html .= '</tr>';      
        $html .= '</div>';
        }
        $html.='</tbody>';  
        $html.='</table>';
        



       
        
    
}
 
echo $html;
?>