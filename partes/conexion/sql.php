<?php
require_once "conexion.php";
class sqlReg extends Principal {
 
    //lista de usuarios
    public function ListTipoUsuario(){
        $sql=Principal::conectar()->prepare("SELECT * FROM roles;");
       $sql->execute();
       $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
       return $dat;
    }
    public function AddUsuario($dato){
        //funcion 1 = insertar
        //funcion 2 = es igual actualizar
        // CALL crubusuario(funcion,codigo,"Contraseña","nombre","foto",estatus,rol o tipo usuario)
        $sql=Principal::conectar()->prepare("CALL crubusuario(:ACCION,:CODIGO,:PASSW,:NOMBRE,:FOTO,1,:ESTADO)");
        $sql->bindParam(":FOTO",$dato['foto']); 
        $sql->bindParam(":ACCION",$dato['accion']); 
        $sql->bindParam(":NOMBRE",$dato['nombre']);
        $sql->bindParam(":PASSW",$dato['contrasena']);
        $sql->bindParam(":CODIGO",$dato['codigo']);
        $sql->bindParam(":ESTADO",$dato['estado']);
        $sql->execute();
        return $sql;
        }

   

}


?>