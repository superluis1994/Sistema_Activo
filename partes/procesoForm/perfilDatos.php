<?php

// echo json_encode("si");
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();

// acciones de registrar usuario
if(isset($_POST["accion"])){
    if($_POST["accion"]=="CambioPasswd"){
        session_start();
   
        $actualpassw=remove_Caracteres($_POST["actual_pass"]);     
        $dato=[
            'id'=>$_SESSION['datos'][$_COOKIE['id']][0],
            'passw'=>$actualpassw,
        ];
        $valPass=$procesoDatos->valClaveActual($dato);
        
        if($valPass==1){
            $NuevaPassw=remove_Caracteres($_POST["nuev_pass"]);
            $dato2=[
                'id'=>$_SESSION['datos'][$_COOKIE['id']][0],
                'passw'=>$NuevaPassw,
            ];
            $CamPass=$procesoDatos->CambiarClaveActual($dato2);
            if($CamPass == 1){

                echo json_encode("correcto");
            }


          
      }else{
         echo json_encode("passwordM");
           
      }

    }




}

function remove_Caracteres($str)
{
    $result = str_replace(array("#", ":","'", ";"), '', $str);
    return $result;
}




?>