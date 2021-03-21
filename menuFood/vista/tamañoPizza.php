   <script type="text/javascript" src= "../controlador/food.js"></script>
   <script type="text/javascript" src="../../js/jquery.min.js"></script>
   <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <div class="panel panel-default">
<?php 

$tip=$_POST['idTipomenu2'];

if($tip==7){
?>
<div class="form-group">
                    <div class="row">
                      <div class="col-sm-6" align="center">
                          <button id="1" onclick="btn_p('<?php echo $vara="GRANDE"?>')" style="" class="btn-default">
                            <img class="img-thumbnail" src="../../img/grande.jpeg" style= "width: 300px; height: 300px; border: none;">
                </button>
                        </div>
                    <div class="col-sm-6">
                          <button id="2" onclick="btn_p('<?php echo $vara="MEDIANA"?>')"class="btn-default">
                            <img class="img-thumbnail" src="../../img/mediana.jpeg" style= "width: 186px; height: 194px; border: none;">
                </button>
                        </div>

                    </div>
                  </div>
  <?php
}else {
require_once('../../conexion/conexion2.php');
                      //consulta para imagen y nombre del menu
                          $db6= Conexion::StartUp();     
                           $select6=$db6->query("SELECT idMenu,nombreMenu, imagenMenu FROM menu where menu.idtipoMenu='$tip'");             
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
                  <label for="imagen"  class="control-label" style="text-align: center; font-size: 12px; font-weight:bold; margin: auto;"><?php echo $nombreMenu2; ?></label>
                  <button id="<?php echo "menu".$i ?>" onclick="btn_om('<?php echo $idmenu2;?>','<?php echo $nombreMenu2;?>');">
                  <img src="<?php echo "../../img/".$imagenMenu ?>" style= "width: 150px; height: 150px; outline: none;">
                </button>
              </div>
              <?php if ($i%$numero==0){
                   
                            ?>
                             </div>
                  </div>
              </div>
                   
                          <?php }
                 }
             }
                   ?>   
                    <div class="form-group">
                    <div class="row">
                                <div id="listarCat">
                                	
                                </div>
                              </div>
                            </div>

              </div>
