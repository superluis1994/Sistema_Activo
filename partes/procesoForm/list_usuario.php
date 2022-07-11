<?php
$resl="";
session_start();

// echo json_encode("si");
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();


if(isset($_POST["accion"])){

if($_POST["accion"]=='buscarUser'){

    $tipo="";
    //  evaluar tipo de busqueda
    if($_POST["filtro"]=="carnet"){
      $tipo="id_user";

    }else if($_POST["filtro"]=="nombre"){
      $tipo="nom";
      
    }
    else if($_POST["filtro"]=="apellido"){
      $tipo="apellidos";
      
    }


    $datos=[
      'filtro'=>$tipo,
      'busqueda'=>$_POST["busqueda"],
      'tabla'=>"usuario"
    ];

    $list_user=$procesoDatos->busquedaFiltro($datos);
    $res="";
    foreach($list_user as $key => $value){
      
      $res.="<tr>";
      $res.="<th scope='row' class='text-center'> <img src='".$value["photo"]."' alt='' height='40' width='40'> </th>
      <td>".$value["id_user"]."</td>
      <td>".$value["nom"]."</td>
      <td>".$value["apellidos"]."</td>
      <td>".$value["correo"]."</td>";

      if($_SESSION["datos"][$_COOKIE["id"]][5]==1){

        if($value["account_status_id"]==1){
          
          $res.="<td><button type='button' value='".$value["id_user"].",".$value["account_status_id"]."' id='btn-statu' class='btn btn-danger'>Desactivar</button></td>";
        }
        else if($value["account_status_id"]==2){
          $res.="<td><button type='button' value='".$value["id_user"].",".$value["account_status_id"]."' id='btn-statu' class='btn btn-success'>Activar</button></td>";

        }
        $res.="<td><button type='button' id='btn-modificar' value='".$value["photo"].",".$value["id_user"].",".$value["nom"].",".$value["apellidos"].",".$value["correo"]."' class='btn btn-primary'>Modificar</button></td>";

      }
     
      $res.="</tr>";      
    }

    echo json_encode($res);

  } else if($_POST["accion"]=='list_usuario_table'){
    $list_user=$procesoDatos->ListTipoUsuario("usuario limit 0,".$_POST["cantida"].";");
    $res="";
    foreach($list_user as $key => $value){
      
      $res.="<tr>";
      $res.="<th scope='row' class='text-center'> <img src='".$value["photo"]."' alt='' height='40' width='40'> </th>
      <td>".$value["id_user"]."</td>
      <td>".$value["nom"]."</td>
      <td>".$value["apellidos"]."</td>
      <td>".$value["Centro_costo"]."</td>
      <td>".$value["correo"]."</td>";

      if($_SESSION["datos"][$_COOKIE["id"]][5]==1){

        if($value["account_status_id"]==1){
          
          $res.="<td><button type='button' value='".$value["id_user"].",".$value["account_status_id"]."' id='btn-statu' class='btn btn-danger'>Desactivar</button></td>";
        }
        else if($value["account_status_id"]==2){
          $res.="<td><button type='button' value='".$value["id_user"].",".$value["account_status_id"]."' id='btn-statu' class='btn btn-success'>Activar</button></td>";

        }
        $res.="<td><button type='button' id='btn-modificar' value='".$value["photo"].",".$value["id_user"].",".$value["nom"].",".$value["apellidos"].",".$value["correo"].",".$value["Centro_costo"]."' class='btn btn-primary'>Modificar</button></td>";

      }
     
      $res.="</tr>";      
    }
    echo json_encode($res);


//     ////////////////////////////////////////
//  // aqui comienzo a trabjar la paginacion para la tabla locales
//  $num_paginas=0;
//  // aqui determino si el numero de datos es inferior al numero de datos que quiero mostrar
//  if($num_datos<8){
//      $num_paginas=1;
//  }else{
//      $num_paginas=round($num_datos/8);
//  }
 
//  // aqui creo los registros de paginacion fila por fila
//  $paginacion="<li class='page-item disabled'>
//  <a class='page-link'  tabindex='-1' aria-disabled='true'>Previous</a>
//  </li>";
//  for($a=0;$a<=$num_paginas;$a++){
//      $numero=$a+1;
//      $g=8*$numero;
//      $paginacion.="<li class='page-item ' aria-current='page'>
//      <a class='page-link' name='".$g."' id='pag' >".$numero."</a>
//      </li>";
//  }
 
//  $paginacion.="<li class='page-item'>
//  <a class='page-link' >Next</a>
//  </li>";
 
//  $Respuestas = [
//      "paginacion"=> $paginacion,
//      "estado"=> "exito",
//      "fila"=> $fila,
//  ];

    //////////////////////////////////////


  }
  // cambiar el estado de activo a desactivo o viceversa
  else if($_POST["accion"]=='estado'){

    $val1=filter_var($_POST["stC"], FILTER_SANITIZE_NUMBER_INT );
    $val2=filter_var($_POST["stV"], FILTER_SANITIZE_NUMBER_INT );
    $estatus=0;
    if($val2==1){
        $estatus=2;
    }
    if($val2==2){
      $estatus=1;
  }
    $datos=[
      'carnet'=>$val1,
      'estado'=>$estatus
    ];
    $rest=$procesoDatos->actualizarEstadoUser($datos);
    echo json_encode($rest);

  }




    
   





    
}
    
    ?>