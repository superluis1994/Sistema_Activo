<?php
$resl="";

// echo json_encode("si");
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();

// acciones de registrar usuario
if(isset($_POST["accion"])){
  if($_POST["accion"]=="RegistrarMovimiento"){

    echo json_encode("success");
  
  }
  else if($_POST["accion"]=="tipo_movimiento"){

    $list=$procesoDatos->ListJefes("tipo_movimiento");
    $resl.="<option value='0' selected>SELECCIONAR....</option>";
    foreach($list as $key => $value){
    
      $resl.="<option value='".$value["id_mov"]."'>".strtoupper($value["tipo_mov"])."</option>";
    
      
    }
    echo json_encode($resl);

  }
  else if($_POST["accion"]=="user_entrega"){

    $list=$procesoDatos->ListJefes("usuario");
    $resl.="<option value='0' selected>SELECCIONAR....</option>";
    foreach($list as $key => $value){
    
      $resl.="<option value='".$value["id_user"]."'>".strtoupper($value["nom"])." ".strtoupper($value["apellidos"])." (".strtoupper($value["id_user"]).") </option>";
    
      
    }
    echo json_encode($resl);

  }
  else if($_POST["accion"]=="list_local"){

    $list=$procesoDatos->ListJefes("local");
    $resl.="<option value='0' selected>SELECCIONAR....</option>";
    foreach($list as $key => $value){
    
      $resl.="<option value='".$value["id_local"]."'>".strtoupper($value["local_name"])." </option>";
    
      
    }
    echo json_encode($resl);

  }
  
}


?>