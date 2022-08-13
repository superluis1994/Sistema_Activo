<?php
$resl="";


require_once "../conexion/sql.php";
require_once "../credenciale/datos.php";
$procesoDatos= new sqlReg ();
session_start();

if(isset($_POST["accion"])){

if($_POST["accion"]=="actualizarDatos"){
    
    // echo json_encode("hola");
$nombre=remove_Caracteres($_POST["Anombre"]);
$apellido=remove_Caracteres($_POST["Aapellidos"]);
$correo=remove_Caracteres($_POST["Acorreo"]);

$codigo=remove_Caracteres($_POST["Acodigo"]);
$tipo=remove_Caracteres($_POST["Atipo"]);
$costo=remove_Caracteres($_POST["Ccosto"]);

$dato=[
      'nombre'=>strtoupper($nombre),
      'apellidos'=>strtoupper($apellido),
      'correo'=>$correo,
      'codigo'=>$codigo,
      'tipo'=>$tipo,
      'costo'=>$costo,
    ];
if(isset($_POST["Apassw"])){
    if($_POST["Apassw"]!=""){
        $contr=remove_Caracteres($_POST["Apassw"]);
        $dato["contrasena"]=$contr;
    }
}


$update=$procesoDatos->ActualizarDatosUser($dato);


    echo json_encode($update);

}
else if($_POST["accion"]=='tipoUserLits'){
         
    $list=$procesoDatos->ListTipoUsuario("roles");
    $resl="";
    foreach($list as $key => $value){
    if($_POST["usuario"] == $value["rol"]){
        $resl.="<option  value='".$value["id_rol"]."' selected>".strtoupper($value["rol"])."</option>";
           
    }else{

        $resl.="<option value='".$value["id_rol"]."'>".strtoupper($value["rol"])."</option>";
    }
    
      
    }
    echo json_encode($resl);
  }

}

function remove_Caracteres($str)
{
    $result = str_replace(array("#", ":","'", ";"), '', $str);
    return $result;
}