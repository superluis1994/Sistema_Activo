<?php
require_once "../conexion/sql.php";
// require_once "../credenciale/datos.php";
$procesoDatos= new sqlReg ();
session_start();


if(isset($_POST["accion"])){

   if($_POST["accion"]=="addActivoSession"){

    

    if(isset($_SESSION[$_COOKIE['id']])){
       
        $user=$_SESSION[$_COOKIE['id']];
        $dat[] = $_COOKIE['id'];
        $dat[] =$_POST["nom"];
        $dat[] =$_POST["serie"];
        $user[$_POST["idAct"]] = $dat;
        $_SESSION[$_COOKIE['id']] = $user;

    }else{

        $dat[] = $_COOKIE['id'];
        $dat[] =$_POST["nom"];
        $dat[] =$_POST["serie"];
        $user[$_POST["idAct"]] = $dat;
        $_SESSION[$_COOKIE['id']] = $user;
    }
    $fil="";
    foreach($_SESSION[$_COOKIE['id']] as $key => $value){

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
      

        unset($_SESSION[$_COOKIE['id']][$_POST["codigo"]]); 
        $fil="";
    
    
        foreach($_SESSION[$_COOKIE['id']] as $key => $value){
    
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
    if(isset($_SESSION[$_COOKIE['id']])){
   foreach ($_SESSION[$_COOKIE['id']] as $key => $value){
    if($value[0]==$_COOKIE["id"]){
        unset($_SESSION[$_COOKIE['id']]);
    }
  }
  
}
echo json_encode("cancelado");
}


}


?>