<?php

if(isset($_POST['accion'])){

    if($_POST["accion"]=="baseDatos"){
        $servidor=$_POST["servidor"];
        $usuario=$_POST["usuario"];
        $pass=$_POST["pass"];
        $bs=$_POST["baseDatos"];
  
                //conexion con el servidor MySQL 
         $cnn = mysqli_connect($servidor,$usuario,$pass);
          if ($cnn) {
            
              //crear tabla
              $sql = "CREATE DATABASE IF NOT EXISTS ".$_POST["baseDatos"];
              if ($cnn->query($sql) === TRUE) {
                       
                        $cnn->select_db($_POST["baseDatos"]);
        
                        $sql = explode(";",file_get_contents('http://localhost/Sistema_Activo/BaseDatos/db/asset_control_db.sql'));
                        foreach($sql as $query){
                       //  mysqli_query($query,$cnn);
                            if ($cnn->query($query) === TRUE) {
                              $resultado="204";
                            }
                        }
                         
                        if($resultado=="204"){ 
        
         //guardar la informacion en el archivo credenciales.php
        $fp = fopen("../../partes/credenciale/credenciales.php","w+"); //abrimos el archivo para escritura
        $contenido="<?php".PHP_EOL;
        $contenido.="define(\"SERVIDOR\",\"$servidor\");".PHP_EOL;
        $contenido.="define(\"USUARIO\",\"$usuario\");".PHP_EOL;
        $contenido.="define(\"CONTRA\",\"$pass\");".PHP_EOL;
        $contenido.="define(\"BASEDATOS\",\"$bs\");".PHP_EOL;
         $contenido.="?>";
            
        fwrite($fp,$contenido);
        fclose($fp);
        echo json_encode("success");

                        }else{
                            echo json_encode("Error en la instalacion");

                        }
        
                     }else{
                   
                    echo json_encode("No se pudo Crear la base de datos ");

                     }
                
                }
                else{
                 
                    echo json_encode("Error de Conexion");
                }
            
    }
    else if($_POST["accion"]=="crearAdmin"){


    }

}




?>