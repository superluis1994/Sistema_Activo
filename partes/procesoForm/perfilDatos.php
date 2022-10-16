<?php

// echo json_encode("si");
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();
session_start();
$id_local=$_SESSION['datos'][$_COOKIE['id']][0];

// acciones de registrar usuario
if(isset($_POST["accion"])){
    if($_POST["accion"]=="CambioPasswd"){
      
   
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

    }else if ($_POST["accion"]=="cargar") {
       $res = $procesoDatos->reserva_datos($id_local);
        echo json_encode($res);
    }else if($_POST["accion"]=="save"){

        
    $correo=$_POST['correo']; 
    
    $eval=$procesoDatos->val_correo('usuario',$_SESSION['datos'][$_COOKIE['id']][0],'correo',$correo);

    if(isset($_POST["foto"]) and $eval == "2"){
        echo "2";
    }else if(isset($_POST["foto"])){
        $query="UPDATE usuario SET correo='".$correo."' WHERE id_user=".$id_local;
        echo  $record=$procesoDatos->update_information($query);
    }else{

        $image_name = $_FILES['foto']['name'];
        $image_temp = $_FILES['foto']['tmp_name'];
        $image_size = $_FILES['foto']['size'];
         
        //quitamos el nombre que trae por defecto
        $exp = explode(".", $image_name);
        $ext = end($exp);
        $imagen='b'.time().'.'.$ext;
        $def= addslashes(file_get_contents($_FILES['foto']['tmp_name']));
       
        //mover la foto a esta ruta :D
        $ruta="../../img/imgPerfil/".$imagen;
        $foto="img/imgPerfil/".$imagen;
        move_uploaded_file($image_temp,$ruta);

        $query="UPDATE usuario SET photo = '".$foto."', correo='".$correo."' WHERE id_user=".$id_local;
       echo  $record=$procesoDatos->update_information($query);
    }
 
    }




}

function remove_Caracteres($str)
{
    $result = str_replace(array("#", ":","'", ";"), '', $str);
    return $result;
}




?>