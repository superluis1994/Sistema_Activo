<?php
require_once "../conexion/sql.php";
// require_once "../credenciale/datos.php";
$procesoDatos= new sqlReg ();
session_start();
// acciones de registrar usuario
if(isset($_POST["accion"])){
    $id=remove_Caracteres($_POST["id"]);
    $ListPermisos=$procesoDatos->ListPermisos($id);
    $lisTpermi="";

    $MENU=[
      'registrar_usu'=>"REGISTRAR USUARIOS",
      'list_usu'=>"VER LISTA USUARIOS",
      'conexion'=>"VER CONEXIONES",
      'mover_activos'=>"MOVER ACTIVO",
      'list_movimiento_activo'=>"VER LISTA DE MOVIMIENTO",
      'regist_producto'=>"REGISTRAR ACTIVOS",
      'mostr_producto'=>"VER INVENTARIO",
      'regist_local'=>"REGISTRAR LOCALES",
      'mostr_local'=>"VER LISTA DE LOCALES",     
  ];
  
    foreach($MENU as $key => $value){
        
      $lisTpermi.="<div class='row mt-2'style='border: 0.5px solid grey;'>
      <div class='col-7 text-center' >
      ".$value."
        </div>
          <div class='col-5'>
              <label class='form-check-label' for='flexSwitchCheckDefault'>OFF</label>
              <label class='form-check-label' for='flexSwitchCheckDefault'>ON</label>
          <div class='form-check form-switch'>
          <input class='form-check-input' type='checkbox' id='flexSwitchCheckDefault' ";
          $lisTpermi.=validCheck($ListPermisos,$key);
          $lisTpermi.=" style='width:80px'>
        </div>
          </div>
    </div>";
    }
 
    echo json_encode($lisTpermi);
}
function remove_Caracteres($str)
{
    $result = str_replace(array("#", ":","'", ";"), '', $str);
    return $result;
}
function validCheck($lista,$campo)
{

  foreach($lista as $key => $value){
  if($value[$campo]=='true'){
   $result='checked';
  }else{
   $result='';
  }
}
    return $result;
}