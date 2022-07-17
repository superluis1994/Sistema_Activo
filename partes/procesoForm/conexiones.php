<?php
require_once "../conexion/sql.php";
// require_once "../credenciale/datos.php";
$procesoDatos= new sqlReg ();
session_start();

// acciones de registrar usuario
if(isset($_POST["accion"])){

    if($_POST["accion"] == "listConexionTable"){
        $resl="";
          $cantidad = $_POST["cantida"];
        // $list=$procesoDatos->ListGenerica("conexiones LIMIT ".$cantidad-$cantidad.",".$cantidad);
        $list=$procesoDatos->ListGenerica("conexiones limit 0, 20");
        
        foreach($list as $key => $value){
        
          $resl.="<tr>
          <th scope='row'>".$value["id_conexion"]."</th>
          <td>".$value["id_user"]."</td>
          <td>".$value["fecha"]."</td>
          <td>".$value["hora"]."</td>
        </tr>";
          
        }


        $numUser=count($procesoDatos->ListGenerica("conexiones"));
    // aqui comienzo a trabjar la paginacion para la tabla locales
    $num_paginas=0;
    // aqui determino si el numero de datos es inferior al numero de datos que quiero mostrar
    if($numUser<20){
      $num_paginas=1;
    }else{
      $num_paginas=ceil($numUser/20);
    }

    // $res="";
    // $_POST["cantida"];
    
    $paginacion ="";
    // aqui creo los registros de paginacion fila por fila siempre y cuando la num pagina sea mayor a 2
    if($num_paginas >1){
      $paginacion="<li class='page-item disabled'>
    <a class='page-link'  tabindex='-1' aria-disabled='true'>Previous</a>
    </li>";
    for($a=0;$a<$num_paginas;$a++){
      $numero=$a+1;
      $g=20*$numero;
      $paginacion.="<li class='page-item ' aria-current='page'>
      <a class='page-link' name='".$g."' id='pagUser' >".$numero."</a>
      </li>";
    }
    
    $paginacion.="<li class='page-item'>
 <a class='page-link' >Next</a>
 </li>";
  }
        
  $Respuestas = [
    "paginacion"=> $paginacion,
    "estado"=> "exito",
    "fila"=> $resl,
   ];

  echo json_encode($Respuestas);
    }


}



    ?>