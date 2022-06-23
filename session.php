<form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="p">
    <button type="submit" name="save">Enviar</button>
</form>
<?php

// session_start();
// echo"<pre>";
// var_dump($_SESSION["datos"]);
// var_dump($_SESSION["datos"][$_COOKIE["id"]]);
// echo"</pre>";

// echo"<br><br>";
// setcookie( "luis", "sortoluis1994");
// echo "token de usuario loguiado: ".$_COOKIE["id"];
// session_destroy();
// print_r($_COOKIE);

// require_once "partes/conexion/conexion.php";

 function decryption($string){
    $key=hash('sha256',"superItca");
    $iv=substr(hash('sha256', "037970" ), 0, 16);
    $output=openssl_decrypt(base64_decode($string), 'AES-256-CBC', $key, 0, $iv);
    return $output;
    }


if(isset($_POST["save"])){
    
     $tt=decryption($_POST["p"]);
     echo $tt;

}


?>