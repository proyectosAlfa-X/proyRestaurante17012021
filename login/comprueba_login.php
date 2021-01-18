<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>
    <?php 
    require_once('../conexion/conexion2.php');
    //$db=Db::conectar();
       
    $user=$_POST["usuario"];
    $clave=$_POST["clave"];
    try{

    $db= Conexion::StartUp();     
   // header("location:../menus/menuA.php");
             // $time = time();

    $hora= date("d-m-Y (H:i:s A)",$time);
    $fecha=date_create(NOW,timezone_open('America/Guatemala'));
    $hora= date_format($fecha, 'd/m/Y g:i:s A');

        
         // $select=("CALL validaUsuarioLogin('$usuario','$clave')");
         
           // foreach($db->query($select)as $r);
    //$hoy=date("d/m/Y g:i:s a");
    $select=$db->query("CALL  validaUsuarioLogin('$user','$clave')");
 
 
 $row =$select->fetch(PDO::FETCH_OBJ);
 $codUs=$row->idUsuario;
 $usu=$row->usuario;
 $clav=$row->contrasena;
 $direcc=$row->direccionSucursal;       
 $municipio=$row->descMunicipio;    
 $rol=$row->rolUsuario;
 $codSucursal=$row->codSucursal;       
      
           //  echo  $rol=$r['rol'];
            // $usu=$r['usuario'];
             //$clav=$r['passwordUsuario'];
             //$direc=$r['direcSucursal'];
             //$municipio=$r['descMunicipio'];
            //echo $rol=$r['estadoUsuario'];
             if($user==$row->usuario&&$clav==$row->contrasena&&$row->rolUsuario=="Administrador"){
              session_start();
              $_SESSION["codUsuario"]=$row->idUsuario;
              $_SESSION["usuario"]=$row->usuario;
              $_SESSION["horaIngreso"]=$hora;
              $_SESSION["municipio"]=$row->descMunicipio;
              $_SESSION["direcc"]=$row->direccionSucursal;
              $_SESSION["codSucursal"]=$row->codSucursal;
              //$_SESSION['rol']=$menu1;
            header("location:../MenuPrincipal.php");
        
       } else
        if($user==$row->usuario&&$clav==$row->contrasena&&$row->rolUsuario=="Mesero"){
              session_start();
               $_SESSION["codUsuario"]=$row->idUsuario;
              $_SESSION["usuario"]=$row->usuario;
              $_SESSION["horaIngreso"]=$hora;
              $_SESSION["municipio"]=$row->descMunicipio;
              $_SESSION["direcc"]=$row->direccionSucursal;
              $_SESSION["codSucursal"]=$row->codSucursal;
            header("location:../MenuMeseroM.php");
     

           
       } else
        if($user==$row->usuario&&$clav==$row->contrasena&&$row->rolUsuario=="Cocinero"){
              session_start();
               $_SESSION["codUsuario"]=$row->idUsuario;
              $_SESSION["usuario"]=$row->usuario;
              $_SESSION["horaIngreso"]=$hora;
              $_SESSION["municipio"]=$row->descMunicipio;
              $_SESSION["direcc"]=$row->direccionSucursal;
              $_SESSION["codSucursal"]=$row->codSucursal;
            header("location:../MenuCocinero.php");
     

           
       } 
       /*if($usu==' '){
        print "<script>alert('Clave Incorrecta'); window.history.back();</script>";
       }
       if($clave==''){
        print "<script>alert('Usuario Incorrecto'); window.history.back();</script>";
       }else*/ else 
      // if($clave!=$clav&&$usuario!=$usu){
       //print "<script>alert('Datos incorrectos'); window.history.back();</script>";
      
      header("LOCATION:../index.html");


       /*else{}
      if($usu!=$usuario&$clave==$clav){
               print "<script>alert('Usuario Incorrecto'); window.history.back();</script>";
              
  
               //window.location(cierre.php);</script>";
             // header("LOCATION:cierre.php");
              
              
            
                 }else{}

                 
                if($usu==$usuario&$clave!=$clav){
              print "<script>alert('Clave Incorrecta'); window.history.back();</script>";
              // header("LOCATION:cierre.php");
       
                }*/
               // else
                 //if($usu!=$usuario&$clave!=$clav){
               //print "<script>alert('Datos Incorrectos'); window.history.back();</script>";
            // header("LOCATION:cierre.php");
       
//}
        
    }catch(Exception $e){
        die("error".$e->getMessage());
    
}
    ?>
</body>
</html>