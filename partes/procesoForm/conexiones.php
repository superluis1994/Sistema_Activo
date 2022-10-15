<?php
// require_once "../credenciale/datos.php";
require_once "../conexion/sql.php";
date_default_timezone_set('america/el_salvador');
$procesoDatos= new sqlReg ();
session_start();

// acciones de registrar usuario
if(isset($_POST["accion"])){

    if($_POST["accion"] == "listConexionTable"){
        $resl="";
          $cantidad =$_POST["cantida"];
          $inferior=$cantidad-20;

          $list=$procesoDatos->ListGenerica("conexiones LIMIT ".$inferior.",".$cantidad);
          $resl1=GenerarListConexiones($list,$inferior+1);
        // $list=$procesoDatos->ListGenerica("conexiones ORDER BY id_conexion DESC limit 0, 20 ");
        
        $numUser=count($procesoDatos->ListGenerica("conexiones"));
        $paginacion=Paginacion($numUser,$inferior+1,$_POST["pg"]);
        
  $Respuestas = [
    "paginacion"=> $paginacion,
    "estado"=> "exito",
    "fila"=> $resl1,
    "fecha"=>date('Y-m-d')
   ];

  echo json_encode($Respuestas);
    }
    if($_POST["accion"] == "BusqueConexion"){
      // $list=$procesoDatos->ListGenerica("conexiones LIMIT ".$inferior.",".$cantidad);
      $parametros=[];
      $limited="";
      $inferior=0;
      if($_POST["fechaI"]!="" && $_POST["fechaF"]!="" ){
        $parametros["fechaI"]=$_POST["fechaI"];
        $parametros["fechaF"]=$_POST["fechaF"];
      }
      if($_POST["cantida"]!=20){
        $cantidad =$_POST["cantida"];
        $inferior=$cantidad-20;
        $limited.=" LIMIT ".$inferior.",".$cantidad."";
      }

      $listConex=$procesoDatos->ListGenerica("conexiones  WHERE id_user = ".$_POST["bsqueda"]." ".$limited);

      $resp=GenerarListConexiones($listConex,1);
      $numUser=count($listConex);
      $paginacion=Paginacion($numUser,$inferior+1,$_POST["pg"]);

      $Respuestas2 = [
        "paginacion"=> $paginacion,
        "estado"=> "exito",
        "fila"=> $resp,
        // "fecha"=>date('Y-m-d')
       ];
      // echo json_encode($numUser);
      echo json_encode($Respuestas2);

    }


}



function GenerarListConexiones($list,$indice) {
  $resl="";
  $num=$indice;
  foreach($list as $key => $value){
        
    $resl.="<tr>
    <th scope='row'>".$num."</th>
    <td>".$value["id_user"]."</td>
    <td>".$value["fecha"]."</td>
    <td>".$value["hora"]."</td>
  </tr>";
  $num++;
    
  }

  return $resl;
}

function Paginacion($numUser,$indice,$pg) {
  // aqui comienzo a trabjar la paginacion para la tabla locales
  $num_paginas=0;
  // aqui determino si el numero de datos es inferior al numero de datos que quiero mostrar
  if($numUser<20){
    $num_paginas=1;
  }else{
    $num_paginas=ceil($numUser/20);
  }  
  $paginacion ="";
  // aqui creo los registros de paginacion fila por fila siempre y cuando la num pagina sea mayor a 2
  if($num_paginas >1){
    // $paginacion.="<li class='page-item disabled'>";
    // if($indice==1){
    //   $paginacion.="<li class='page-item disabled'>
    //   <a class='page-link'  tabindex='-1' aria-disabled='true'>Previous</a>
    //   </li>";
    // }else{
    //   $paginacion.="<li class='page-item '>
    //   <a class='page-link'  tabindex='-1' aria-disabled='true'>Previous</a>
    //   </li>";
    // }
   
  for($a=0;$a<$num_paginas;$a++){
    $numero=$a+1;
    $g=20*$numero;
    if($a==$pg-1){
      $paginacion.="<li class='page-item active' aria-current='page'>
      <a class='page-link' name='".$g.",".$numero."' id='pagUser' >".$numero."</a>
      </li>";
    }else{
      $paginacion.="<li class='page-item ' aria-current='page'>
      <a class='page-link' name='".$g.",".$numero."' id='pagUser' >".$numero."</a>
      </li>";
    }
  }
// if($pg==$num_paginas){
//   $paginacion.="<li class='page-item disabled'>
//   <a class='page-link' >Next</a>
//   </li>";
// }else{
//   $paginacion.="<li class='page-item'>
// <a class='page-link' >Next</a>
// </li>";

// }
}



  return $paginacion;
}


    ?>