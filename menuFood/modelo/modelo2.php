

<?php
require_once('../../conexion/conexion2.php');
$html="";
  $html=$_POST["elegido2"];	
?>

<?php //echo $hola;

                   
                          
                          //echo $hola;
                           $db5= Conexion::StartUp();    
                           $select5=$db5->query("SELECT * FROM producto where estadoProducto='A' and idProducto='$html'");
                           while($row123 =$select5->fetch(PDO::FETCH_OBJ)){ 
                          $imgsd=$row123->imagenProducto;
               }
                  ?>
                  
                          <img style="width: 95%; height: 90%" src='<?php echo "../../".$imgsd ?>'>

                  