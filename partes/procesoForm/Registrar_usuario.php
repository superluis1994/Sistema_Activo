<?php
$resl="";

// echo json_encode("si");
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();

// acciones de registrar usuario
if(isset($_POST["accion"])){

  
  if($_POST["accion"]=='tipoUserLits'){
         
      $list=$procesoDatos->ListTipoUsuario();
      $resl.="<option selected>Open this select menu</option>";
      foreach($list as $key => $value){
      
        $resl.="<option value='".$value["id_rol"]."'>".strtoupper($value["rol"])."</option>";
      
        
      }
      echo json_encode($resl);
  }
  else if($_POST["accion"]=='RegistrarUsuario'){

    $dato=[
      'accion'=>1,
      'foto'=>"jssjjs/sjsjjsjs.jpg",
      'nombre'=>$_POST["nombre"]." ".$_POST["apellidos"],
      'contrasena'=>"sorto",
      'codigo'=>$_POST["codigo"],
      'estado'=>$_POST["tipo"]
  ];
     $insert=$procesoDatos->AddUsuario($dato);
    // echo json_encode($dato["estado"]." ".$dato["nombre"]." ".$dato["codigo"]." ".$dato["estado"]." ".$dato["accion"]." ".$dato["foto"]." ".$dato["contrasena"]);

  }

  
}

  

  

?>