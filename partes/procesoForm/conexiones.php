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
        $list=$procesoDatos->ListGenerica("conexiones ");
        
        foreach($list as $key => $value){
        
          $resl.="<tr>
          <th scope='row'>".$value["id_conexion"]."</th>
          <td>".$value["id_user"]."</td>
          <td>".$value["fecha"]."</td>
          <td>".$value["hora"]."</td>
        </tr>";
          
        }
        
    }
    echo json_encode($resl);


}



    ?>