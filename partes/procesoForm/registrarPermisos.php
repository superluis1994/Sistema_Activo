
<?php
require_once "../conexion/sql.php";
// require_once "../credenciale/datos.php";
$procesoDatos= new sqlReg ();
session_start();
// acciones de registrar usuario
if(isset($_POST["accion"])){

    if($_POST["accion"] == "rgPermiso"){

      
        echo json_encode($_POST["conexion"]);

}
}



// $MENU=[
//       'registrar_usu'=>"REGISTRAR USUARIOS",
//       'list_usu'=>"VER LISTA USUARIOS",
//       'conexion'=>"VER CONEXIONES",
//       'mover_activos'=>"MOVER ACTIVO",
//       'list_movimiento_activo'=>"VER LISTA DE MOVIMIENTO",
//       'regist_producto'=>"REGISTRAR ACTIVOS",
//       'mostr_producto'=>"VER INVENTARIO",
//       'regist_local'=>"REGISTRAR LOCALES",
//       'mostr_local'=>"VER LISTA DE LOCALES",     
//   ];

  ?>