<?php
require_once "../Credenciales/credenciales.php";
// require_once "";

class Principal {
    //conexion a la base de datos
    protected static function conectar(){
        
        //las constantes vienen de contenido/XMLCARP/credenciales.php
    try {
    $mbd = new PDO("mysql:host=".SERVIDOR.";dbname=".BASEDATOS, USUARIO, CONTRA);  
    } catch (PDOException $e) {
    $mbd = "Erro al conectar".$e;
    die();
    }
    
    //retorna la conexion
    return $mbd;
    }
    
    //Funcion de encriptado para las claves
    public function encryption($string){
    $output=FALSE;
    $key=hash('sha256', SECRET_KEY);
    $iv=substr(hash('sha256', SECRET_IV), 0, 16);
    $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
    $output=base64_encode($output);
    return $output;
    }
    //funcion de desencriptar para claves
    public function decryption($string){
    $key=hash('sha256', SECRET_KEY);
    $iv=substr(hash('sha256', SECRET_IV), 0, 16);
    $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
    return $output;
    }
       

    
    //fin de la clase
    }


?>