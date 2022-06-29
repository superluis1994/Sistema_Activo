<?php
$resl="";

// echo json_encode("si");
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();

// acciones de registrar usuario
if(isset($_POST["accion"])){
  if($_POST["accion"]=="RegistrarLocal"){

    echo json_encode("success");
  
  }
  else if($_POST["accion"]=="list_jefes"){

    $list=$procesoDatos->ListGenerica("usuario");
    $resl.="<option selected>SELECCIONAR....</option>";
    foreach($list as $key => $value){
    
      $resl.="<option value='".$value["id_user"]."'>".strtoupper($value["nom"])." ".strtoupper($value["apellidos"])." (".strtoupper($value["id_user"]).") </option>";
    
      
    }
    echo json_encode($resl);

  }
  
}


?>