<?php
require_once "../conexion/sql.php";
require_once "Class/paginacionBs-class.php";
date_default_timezone_set('america/el_salvador');
$procesoDatos= new sqlReg ();
session_start();

// acciones de registrar usuario
if(isset($_POST["accion"])){

  
    if($_POST["accion"] == "busquedaMdf"){
      // $list=$procesoDatos->ListGenerica("conexiones LIMIT ".$inferior.",".$cantidad);
      $parametros=[];
      $limited="";
      $inferior=0;
      $cantidad =$_POST["cantida"];

      if($_POST["fechaI"]!="" && $_POST["fechaF"]!="" ){
        $parametros["fechaI"]=$_POST["fechaI"];
        $parametros["fechaF"]=$_POST["fechaF"];
        $fechI=strtotime($_POST["fechaI"]);
        $fechaI = date('Y-m-d', $fechI);
        $fechF=strtotime($_POST["fechaF"]);
        $fechaF = date('Y-m-d', $fechF);
        $sql=" conexiones  WHERE id_user = ".$_POST["bsqueda"]." AND fecha BETWEEN '".$fechaI."' AND '".$fechaF."' LIMIT ".$cantidad;;
      }else{
        $sql=" conexiones  WHERE id_user = ".$_POST["bsqueda"]." LIMIT ".$cantidad;
      }
      if($_POST["cantida"]!=20){
        $inferior=$cantidad-20;
        $limited.=" LIMIT ".$cantidad." ".$inferior."";
        $sql.=" OFFSET ".$inferior;
      }
     
      
      $listConex=$procesoDatos->ListGenerica($sql);
      
      $numUser=count($t=$procesoDatos->ListGenerica("conexiones  WHERE id_user = ".$_POST["bsqueda"]));

      $resp=GenerarListConexiones($listConex,1);
      // $numUser=count($listConex);
      $paginacion=PaginacionV1($numUser,$inferior+1,$_POST["pg"]);

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
    ?>