<?php
session_start();
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();

if(isset($_POST["accion"])){

    if($_POST['accion'] == "estadoUser"){
        
        $opt=[
            "accion" => "console.log('llego aqui')",
            "timer" => "1000",
            "opt" => ""
        ];
        if(isset($_COOKIE['id'])){

            if(isset($_SESSION['datos'][$_COOKIE['id']][0])){
                $id=$_SESSION['datos'][$_COOKIE['id']][0];
                
               $datos=[
                 "tabla" => "usuario",
                 "id" => $id];
    
               $rest=$procesoDatos->List($datos);
               
               if($rest[0]["account_status_id"] == 2){
                   $opt=[
                    "accion" => "window.location.replace('index.php'); ",
                    "timer" => "6000",
                    "opt" => "desactivado"
                ];
                unset($_SESSION['datos'][$_COOKIE['id']]);
                    setcookie(
                    $name= "id",
                    $value = "",
                    $expires = 0,
                    $path = "/",
                    $domain = "localhost",
                    $secure = false,
                    $httponly = false);
    
                    }
                   else if($rest[0]["account_status_id"] == 3){
                        $opt=[ 
                            "accion" => "location.reload();",
                            "timer" => "3000",
                            "opt" => "recargar"
                    ];
    
                    $sql="UPDATE usuario SET account_status_id = 1
                    WHERE id_user = ".$_SESSION['datos'][$_COOKIE['id']][0];
                    $actualizar=$procesoDatos->sqlConsulta($sql);
                         }
           }
     
                     
           
           // echo"luis";
           
        }
        echo json_encode($opt);
     
     }
}


?>