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
      "nombre"=> strtoupper($nombre),
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







  else if($_POST["accion"]=="Tabla"){
    $fila="";
    $num_datos=0;
    // datos para consultar a la base de datos
    $dataTable = [
      "tabla"=> "`local`",
      "inferior"=> "0",
      "superior"=> "8",
    ];

   
    $list=$procesoDatos->tablas($dataTable);
    // crear las filas de la tabla 
    foreach($list as $key => $value){
      $num_datos++;
      $fila.= "<tr>
      <th scope='row'>".$value["id_local"]."</th>
      <td>".$value["local_name"]."</td>
      <td>".$value["jefe_local"]."</td>
      <td>".$value["fecha_regis"]."</td>
      <td>".$value["registradoX"]."</td>";
      if($_SESSION["datos"][$_COOKIE["id"]][5]==1){
      if($value["estatus"] == 1){
      
      $fila.="<td><button type='button' value='".$value["id_local"].",".$value["estatus"]."' id='btn-statu' class='btn btn-danger'>Desactivar</button></td>";

      }else{
      $fila.="<td><button type='button' value='".$value["id_local"].",".$value["estatus"]."' id='btn-statu' class='btn btn-success'>Activar</button></td>";
            
      }
    }

    $fila.="</tr>";
      
    }
    // aqui comienzo a trabjar la paginacion para la tabla locales
    $num_paginas=0;
    // aqui determino si el numero de datos es inferior al numero de datos que quiero mostrar
    if($num_datos<8){
      $num_paginas=1;
    }else{
      $num_paginas=round($num_datos/8);
    }
    
    // aqui creo los registros de paginacion fila por fila
    $paginacion="<li class='page-item disabled'>
    <a class='page-link'  tabindex='-1' aria-disabled='true'>Previous</a>
    </li>";
   for($a=0;$a<=$num_paginas;$a++){
    $numero=$a+1;
    $g=8*$numero;
     $paginacion.="<li class='page-item ' aria-current='page'>
       <a class='page-link' name='".$g."' id='pag' >".$numero."</a>
      </li>";
   }

   $paginacion.="<li class='page-item'>
    <a class='page-link' >Next</a>
    </li>";
    
    $Respuestas = [
      "paginacion"=> $paginacion,
      "estado"=> "exito",
      "fila"=> $fila,
    ];
    echo json_encode($Respuestas);

  }





  
  // aqui cargo la lista de jefes del apardo de registrar local
  else if($_POST["accion"]=="list_jefes"){

    $list=$procesoDatos->ListGenerica("usuario");
    $resl.="<option value='0' selected>SELECCIONAR....</option>";
    foreach($list as $key => $value){
    
      $resl.="<option value='".$value["id_user"]."'>".strtoupper($value["nom"])." ".strtoupper($value["apellidos"])." (".strtoupper($value["id_user"]).") </option>";
    
      
    }
    echo json_encode($resl);

  }
  
}
// cree esta funcion para limpiar los texto de caulquier caracter peligroso en sql
function remove_Caracteres($str)
{
    $result = str_replace(array("#", ":","'", ";"), '', $str);
    return $result;
}


?>