<?php
require_once "../conexion/sql.php";
// require_once "../credenciale/datos.php";
$procesoDatos= new sqlReg ();
session_start();


if(isset($_POST["accion"])){

   if($_POST["accion"]=="addActivoSession"){

    

    if(isset($_SESSION["actList"])){
       
        $user=$_SESSION["actList"];
        $dat[] = $_COOKIE['id'];
        $dat[] =$_POST["nom"];
        $dat[] =$_POST["serie"];
        $user[$_POST["idAct"]] = $dat;
        $_SESSION["actList"] = $user;

    }else{

      
        $dat[] = $_COOKIE['id'];
        $dat[] =$_POST["nom"];
        $dat[] =$_POST["serie"];
        $user[$_POST["idAct"]] = $dat;
        $_SESSION["actList"] = $user;
    }
    $fil="";
    foreach($_SESSION["actList"] as $key => $value){

          if($_COOKIE['id']==$value[0]){
            $fil.="<tr>
                <td scope='row'>".$key."</td>
                <td>".$value[1]."</td>
                  <td>".$value[2]."</td>
                  <td>
                  <button type='button' name='' value='".$key."'id='btn-actSession' class='btn btn-primary'>Eliminar</button>
                 </td>
                 </tr>";
          }

    }
    
    echo json_encode($fil);

   }
   if($_POST["accion"]=="EliActivoSession"){
      
    unset($_SESSION["actList"][$_POST["codigo"]]); 
    $fil="";


    foreach($_SESSION["actList"] as $key => $value){

        if($_COOKIE['id']==$value[0]){
          $fil.="<tr>
              <td scope='row'>".$key."</td>
              <td>".$value[1]."</td>
                <td>".$value[2]."</td>
                <td>
                <button type='button' name='' value='".$key."'id='btn-actSession' class='btn btn-primary'>Eliminar</button>
               </td>
               </tr>";
        }

  }
  echo json_encode($fil);

   }
   if($_POST["accion"]=="cancelarMov"){
   foreach ($_SESSION['actList'] as $key => $value){
    if($value[0]==$_COOKIE["id"]){
        unset($_SESSION['actList'][$key]);
    }
  }
  echo json_encode("cancelado");

}


}


?>