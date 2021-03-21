   <script type="text/javascript" src= "../controlador/food.js"></script>
   <script type="text/javascript" src="../../js/jquery.min.js"></script>
   <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">

<div class="panel panel-default">
  <div class="form-group">
  <div class="row">

<?php 
require_once('../../conexion/conexion2.php');
                      //consulta para imagen y nombre del menu
                          $db6= Conexion::StartUp();     
                           $select6=$db6->query("SELECT idTipoMenu,descripcionTipoMenu, imgTipoMenu FROM tipoMenu");             
                           $i=0;
                    
                    while($row6 =$select6->fetch(PDO::FETCH_OBJ)){
                    $idTipoMenu2=$row6->idTipoMenu;
                    $nombreMenu2=$row6->descripcionTipoMenu;
                   $imagenMenu=$row6->imgTipoMenu;
                   ?> 

                    <div class="col-sm-2">
                
                  <label for="imagen"  class="control-label" style="text-align: center; font-size: 12px; font-weight:bold; margin: auto;"><?php echo $nombreMenu2 ?></label>

                  <button id="<?php echo "menu".$i ?>" onclick="btn_ic('<?php echo $idTipoMenu2;?>');" style="" class="btn-default">
                  <img class="img-thumbnail" src="<?php echo "../../img/".$imagenMenu ?>" style= "width: 186px; height: 194px; border: none;">
                </button>
              </div>
              
                
                   <?php
                 }
                   ?> 
                </div>
                </div>



                  <div class="form-group">
                    <div class="row">
                                <div id="listarCategoria"></div>
                              </div>
                            </div>
</div>

