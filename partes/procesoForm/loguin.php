<?php

require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();

if(isset($_POST["accion_logui"])){

if(!$_POST["codigo"]=="" && ! $_POST["contra"]=="" ){

    $codigo=filter_var($_POST["codigo"], FILTER_SANITIZE_NUMBER_INT );
    $passd=filter_var($_POST["contra"], FILTER_SANITIZE_STRING);
    $dato=[
        'codigo'=>$_POST["codigo"],
        'pass'=>$_POST["contra"]
    ];

    $results=$procesoDatos->loguiar($dato);
    echo json_encode($results);

   
}
else{
    
    echo json_encode(2);

}

}
else if(isset($_POST['rest_loguin'])){
    if(!$_POST["codigo"]=="" ){
       
         $perfil=$procesoDatos->restClave($_POST["codigo"]);

         echo json_encode($perfil["correo"]);


    }else{

    }
    
}

// $perfil=$procesoDatos->restClave("343566");
// echo $perfil["correo"]
// var_dump($perfil)



// setcookie("usuarioActivo", "Hola");



?>