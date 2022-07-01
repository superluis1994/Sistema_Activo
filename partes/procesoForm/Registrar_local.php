<?php
$resl="";
session_start();

// echo json_encode("si");
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();

// acciones de registrar usuario
if(isset($_POST["accion"])){
  if($_POST["accion"]=="RegistrarLocal"){


    $codigo=remove_Caracteres($_POST["Lcodigo"]);
    $nombre=remove_Caracteres($_POST["Lnombre"]);
    $resposable=remove_Caracteres($_POST["select_box"]);

    date_default_timezone_set('america/el_salvador');
    $fecha=date('Y-m-d');
    $dato = [
      "codigo"=> $codigo,
      "nombre"=> $nombre,
      "responsable"=> $resposable,
      "fecha"=>$fecha,
      "estatus"=>"1",
      "id_user"=>$_SESSION['datos'][$_COOKIE['id']][0],
    ];

   $respuesta=$procesoDatos->insertLocal($dato);
   if($respuesta == 1){
    $dataRespuesta = [
      "icono"=> "success",
      "titulo"=> "Realizado",
      "texto"=> "El local se registro correctamente"
    ];

   }else{

     $dataRespuesta = [
       "icono"=> "error",
       "titulo"=> "error",
       "texto"=> "Esta es una prueba"
     ];
   }



    echo json_encode($dataRespuesta);
  
  }
  else if($_POST["accion"]=="validarLocal"){

    $codigo=remove_Caracteres($_POST["codigo"]);

    $validacion=$procesoDatos->validarLocal($codigo);
    if($validacion == 1){
      $dataRespuesta = [
        "opcion1"=> "is-valid",
        "opcion2"=> "is-invalid",
      ];
    }else{
      $dataRespuesta = [
        "opcion1"=> "is-invalid",
        "opcion2"=> "is-valid",
      ];
    }
    echo json_encode($dataRespuesta);


  }
  else if($_POST["accion"]=="list_jefes"){

    $list=$procesoDatos->ListGenerica("usuario");
    $resl.="<option value='0' selected>SELECCIONAR....</option>";
    foreach($list as $key => $value){
    
      $resl.="<option value='".$value["id_user"]."'>".strtoupper($value["nom"])." ".strtoupper($value["apellidos"])." (".strtoupper($value["id_user"]).") </option>";
    
      
    }
    echo json_encode($resl);

  }
  
}
function remove_Caracteres($str)
{
    $result = str_replace(array("#", ":","'", ";"), '', $str);
    return $result;
}


?>