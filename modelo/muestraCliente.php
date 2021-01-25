<?php
  $nit1=$_POST['nit'];
  //$cliente1="Josue";
    include("../../conexion/conexion2.php");
    $db2= Conexion::StartUp(); 
      
    $select2=$db2->query("CALL readClienteJ('$nit1')");
    $row =$select2->fetch(PDO::FETCH_OBJ);
    $nit=$row->nitCliente;
    $cliente=$row->nombreCliente;
    $direccionE=$row->direccionCliente;
    $fechaActual = date('d-m-Y');
    $arr=array('cliente'=>$cliente,'nit'=>$nit,'direccionC'=>$direccionE,'fecha'=>$fechaActual);
     
    echo json_encode($arr);
//soniafuentes@umg.edu.gt
    ?>

