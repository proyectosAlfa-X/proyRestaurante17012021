   <script type="text/javascript" src= "../controlador/food.js"></script>
   <script type="text/javascript" src="../../js/jquery.min.js"></script>
   <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">

<div class="panel panel-default">
<?php 

$idTipoMenu= 7;
$var=$_POST['vara'];



require_once('../../conexion/conexion2.php');
                      //consulta para imagen y nombre del menu
                          $db6= Conexion::StartUp();     
                           $select6=$db6->query("SELECT idMenu,nombreMenu, imagenMenu FROM menu where menu.idtipoMenu='$idTipoMenu' and tamañoMenu='$var'");             
                           $i=0;
                           $numero=6;
                           
                           
                            

                    
                    while($row6 =$select6->fetch(PDO::FETCH_OBJ)){
                    $idmenu2=$row6->idMenu;
                    $nombreMenu2=$row6->nombreMenu;
                   $imagenMenu=$row6->imagenMenu;
                   $i++;

                   if ($i%$numero==0){
                    
                            ?>
                            
                              <div class="form-group">
                    <div class="row">

                          <?php }?>

                    <div class="col-sm-2" align="center">
                  <label for="imagen"  class="control-label" style="text-align: center; font-size: 10px; font-weight:bold; margin: auto;"><?php echo $nombreMenu2 ?></label>
                  <button id="<?php echo "menu".$i ?>" onclick="btn_om('<?php echo $idmenu2;?>','<?php echo $nombreMenu2;?>');">
                  <img src="<?php echo "../../img/".$imagenMenu ?>" style= "width: 150px; height: 150px; outline: none;">
                </button>
              </div>
              <?php if ($i%$numero==0){
                   
                            ?>
                             </div>
                  </div>
                   
                          <?php }?>
              
                   
                   <?php
                 }
                   ?>   

              </div>
            