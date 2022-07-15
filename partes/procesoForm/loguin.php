<?php
session_start();
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();

if(isset($_POST["accion_logui"])){

    
    $codigo=filter_var($_POST["codigo"], FILTER_SANITIZE_NUMBER_INT );
    $passd=filter_var($_POST["contra"], FILTER_SANITIZE_STRING);
    $dato=[
        'codigo'=>$_POST["codigo"],
        'pass'=>$_POST["contra"]
    ];

    $results=$procesoDatos->loguiar($dato);
    if($results==1){
        // genero el token
        $token=generar_token_seguro(20);
        //genero la session
        if(isset($_SESSION["datos"])){
            $datosUsuario=$procesoDatos->Datos_usuario($dato);
            $user=$_SESSION["datos"];
            $dat[] =$datosUsuario["id_user"];
            $dat[] =$datosUsuario["nom"];
            $dat[] =$datosUsuario["apellidos"];
            $dat[] =$datosUsuario["correo"];
            $dat[] =$datosUsuario["photo"];
            $dat[] =$datosUsuario["rol_id"];
            $user[$token] = $dat;
            $_SESSION["datos"] = $user;

        }else{

            $datosUsuario=$procesoDatos->Datos_usuario($dato);
            $dat[] =$datosUsuario["id_user"];
            $dat[] =$datosUsuario["nom"];
            $dat[] =$datosUsuario["apellidos"];
            $dat[] =$datosUsuario["correo"];
            $dat[] =$datosUsuario["photo"];
            $dat[] =$datosUsuario["rol_id"];
            $user[$token] = $dat;
            $_SESSION["datos"] = $user;
        }
    // creo el cookies con el token para identificar los datos de la session 
        setcookie(
            $name= "id",
            $value = $token,
            $expires = 0,
            $path = "/",
            $domain = "localhost",
            $secure = false,
            $httponly = false);

    // inserto los datos de la conexion del usuario 
    // if(isset($_SESSION['datos'][$_COOKIE['id']])){

        date_default_timezone_set('america/el_salvador');
      
        $datoConex=[
            'codigo'=>$codigo,
            'fecha'=>date('Y-m-d'),
            'hora'=>date('h:i:s')
        ];
    

        $regisConex=$procesoDatos->registrarConexion($datoConex);

        // echo json_encode($regisConex);
    // }
    
    
    
}
echo json_encode($results);

   


}
else if(isset($_POST['rest_loguin'])){
    if(!$_POST["codigo"]=="" ){
        
        $perfil=$procesoDatos->restClave($_POST["codigo"]);
        
        echo json_encode($perfil["correo"]);
        
        
    }else{
        
    }
    
}

function generar_token_seguro($longitud)
{
    if ($longitud < 4) {
        $longitud = 4;
    }
    
    return bin2hex(openssl_random_pseudo_bytes(($longitud - ($longitud % 2)) / 2));
}
// $perfil=$procesoDatos->restClave("343566");
// echo $perfil["correo"]
// var_dump($perfil)



// setcookie("usuarioActivo", "Hola");



?>