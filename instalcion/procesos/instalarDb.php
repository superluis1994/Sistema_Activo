<?php

if(isset($_POST['accion'])){

    if($_POST["accion"]=="baseDatos"){
        $servidor=$_POST["servidor"];
        $usuario=$_POST["usuario"];
        $pass=$_POST["pass"];
        $bs=$_POST["baseDatos"];
  
        // echo json_encode($servidor,$usuario,$pass);
                //conexion con el servidor MySQL 
         $cnn = mysqli_connect($servidor,$usuario,$pass);
          if ($cnn) {
              echo json_encode("sipi");
              
              //crear tabla
              $sql = "CREATE DATABASE IF NOT EXISTS ".$_POST["baseDatos"];
              if ($cnn->query($sql) === TRUE) {
                       
                        $cnn->select_db($_POST["baseDatos"]);
        
                        $sql = explode(";",file_get_contents('../../BaseDatos/db/asset_control_db.sql'));
                        foreach($sql as $query){
                       //  mysqli_query($query,$cnn);
                            if ($cnn->query($query) === TRUE) {
                              $resultado="204";
                            }
                        }
                         
                        if($resultado=="204"){ 
        
         //guardar la informacion en el archivo credenciales.php
         
         
        $fp = fopen("../../partes/Credenciales/credenciales.php","w+"); //abrimos el archivo para escritura
        $contenido="<?php".PHP_EOL;
        $contenido.="define(\"SERVIDOR\",\"$servidor\");".PHP_EOL;
        $contenido.="define(\"USUARIO\",\"$usuario\");".PHP_EOL;
        $contenido.="define(\"CONTRA\",\"$pass\");".PHP_EOL;
        $contenido.="define(\"BASEDATOS\",\"$bs\");".PHP_EOL;
         $contenido.="?>";
            
        fwrite($fp, "$contenido");
        fclose($fp);
                            echo $resultado;
                        }else{
                            echo "404";
                        }
        
                     }else{
                        //  echo "406";
                    // echo json_encode("aqui");

                     }
        
        
                
                }
                else{
                 
                    echo json_encode("error");
                }
            
                //creacion de la base de datos
        
            
        

    }
}
 // // echo json_encode("error"); 



// Crear conexión
// $conn = new mysqli ("localhost", "root");
// // La conexión de prueba
// if ($conn) {
// echo json_encode("error");

// }else{
//     echo json_encode("luis");
    
// }
// mysql_close($conn);


?>