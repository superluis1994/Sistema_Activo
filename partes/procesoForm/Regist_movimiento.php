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


  ////////////////////cargar los select////////////////////////////////////////////////
  else if($_POST["accion"]=="select"){
/////////tipo de movimiento///////////////
    $list1=$procesoDatos->ListGenerica("tipo_movimiento");
    $tipo_movimiento="<option value='0' selected>SELECCIONAR....</option>";
    foreach($list1 as $key => $value){
    
      $tipo_movimiento.="<option value='".$value["id_mov"]."'>".strtoupper($value["tipo_mov"])."</option>";
    
      
    }
///////////////usuarios/////////////////
    $list2=$procesoDatos->ListGenerica("usuario");
    $list_usuario="<option value='0' selected>SELECCIONAR....</option>";
    foreach($list2 as $key => $value){
    
      $list_usuario.="<option value='".$value["id_user"]."'>".strtoupper($value["nom"])." ".strtoupper($value["apellidos"])." (".strtoupper($value["id_user"]).") </option>";
    
      
    }


  /////////////locales////////////////////////////////
  $list3=$procesoDatos->ListGenerica("local");
  $list_Local="<option value='0' selected>SELECCIONAR....</option>";
  foreach($list3 as $key => $value){
  
    $list_Local.="<option value='".$value["id_local"]."'>".strtoupper($value["local_name"])." </option>";
  
    
  }
  $SelectRest = [
    "usuario"=> $list_usuario,
    "locales"=>$list_Local,
    "tipoMov"=> $tipo_movimiento,
 
  ];

    echo json_encode($SelectRest);
    // echo json_encode("si entro");
  }

  // else if($_POST["accion"]=="tipo_movimiento"){

  //   $list=$procesoDatos->ListGenerica("tipo_movimiento");
  //   $resl.="<option value='0' selected>SELECCIONAR....</option>";
  //   foreach($list as $key => $value){
    
  //     $resl.="<option value='".$value["id_mov"]."'>".strtoupper($value["tipo_mov"])."</option>";
    
      
  //   }
  //   echo json_encode($resl);

  // }
  // else if($_POST["accion"]=="user_entrega"){

  //   $list=$procesoDatos->ListGenerica("usuario");
  //   $resl.="<option value='0' selected>SELECCIONAR....</option>";
  //   foreach($list as $key => $value){
    
  //     $resl.="<option value='".$value["id_user"]."'>".strtoupper($value["nom"])." ".strtoupper($value["apellidos"])." (".strtoupper($value["id_user"]).") </option>";
    
      
  //   }
  //   echo json_encode($resl);

  // }
  // else if($_POST["accion"]=="list_local"){

  //   $list=$procesoDatos->ListGenerica("local");
  //   $resl.="<option value='0' selected>SELECCIONAR....</option>";
  //   foreach($list as $key => $value){
    
  //     $resl.="<option value='".$value["id_local"]."'>".strtoupper($value["local_name"])." </option>";
    
      
  //   }
  //   echo json_encode($resl);

  // }
  elseif($_POST["accion"]=="informacionActivo"){

    $cod=remove_Caracteres($_POST["codigoActivo"]);
    $local=remove_Caracteres($_POST["localP"]);
    $dato = [
      "codigo"=> $cod,
      "tabla"=> "inventario",
      "campo"=> "id_activo",
      "local"=> $local,
   
    ];
$tabla="";
    $resp=$procesoDatos->busquedInfActi($dato);
    foreach($resp as $key => $value){
      $tabla.="<div class='row g-0'>
    <div class='col-md-4'>
      <img src='".$value["foto"]."' class='img-fluid rounded-start'  alt='...'>
    </div>
    <div class='col-md-8'>
    <div class='card-body'>
    <h5 class='card-title'>".$value["nom_activo"]."</h5>
    <p class='card-text'>".$value["id_activo"]."</p>
    <p class='card-text'>".$value["serie"]."</p>
    <p class='card-text'>".$value["descrip_activo"]."</p>
    <div class='d-grid gap-2'>
    <button type='button' name='' value='".$value["nom_activo"].",".$value['id_activo'].",".$value["serie"]."' id='btn-agre' class='btn btn-primary'>Agregar</button>
    </div>
    </div>
    </div>
    </div>";
    
    
    
  }
  echo json_encode($tabla);

         
  }else if($_POST["accion"]=="prueba"){
    echo json_encode($_POST["usuarioEntre"]);
    // echo json_encode("$('#listActi').modal('show')");

    // $('#listActi').modal('show');

   
    
  }

}
// cree esta funcion para limpiar los texto de caulquier caracter peligroso en sql
function remove_Caracteres($str)
{
    $result = str_replace(array("#", ":","'", ";"), '', $str);
    return $result;
}


?>