<?php
require_once "../conexion/sql.php";
// require_once "../credenciale/datos.php";
$procesoDatos= new sqlReg ();
session_start();
// acciones de registrar usuario
if(isset($_POST["accion"])){
    if($_POST["accion"]=="rgPermiso"){

        
        $datos=[
            'id'=>$_POST["id"],
            'registrar_usu'=>$_POST["1registrar_usu"],
            'list_usu'=>$_POST["1list_usu"],
            'conexion'=>$_POST["1conexion"],
            'mover_activos'=>$_POST["1mover_activos"],
            'list_movimiento_activo'=>$_POST["1list_movimiento_activo"],
            'regist_producto'=>$_POST["1regist_producto"],
            'mostr_producto'=>$_POST["1mostr_producto"],
            'regist_local'=>$_POST["1regist_local"],
            'mostr_local'=>$_POST["1mostr_local"],     
        ];



        $respue=$procesoDatos->actualizarPermisos($datos);
        if($respue!=0){
            $R=[
                'funcion'=>"alerta('success','Actualizacion Completada','sssss')",    
                'timer'=>"500",    
                'recargar'=>"location.reload()", 
                'timer2'=>"2000",    
            ];
    
        }
    }

echo json_encode($R);


}

