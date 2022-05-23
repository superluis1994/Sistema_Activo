<?php
require_once "conexion.php";
class sqlReg extends Principal {

    public function loguiar($dato){
        $sql=Principal::conectar()->prepare("SELECT COUNT(*) FROM  usuario WHERE id_user = :CODIGO && passw = :PASSWD ;");
        $sql->bindParam(":CODIGO",$dato['codigo']); 
        $sql->bindParam(":PASSWD",$dato['pass']); 
       $sql->execute();
       $count=$sql->fetchColumn();
       return $count;
    }
    // restablecer contraseña paso1
    public function restClave($dato){
        $sql=Principal::conectar()->prepare("SELECT * FROM  usuario WHERE id_user = :CODIGO ");
        $sql->bindParam(":CODIGO",$dato); 
       $sql->execute();
       $dat=$sql->fetch(PDO::FETCH_ASSOC);
       return $dat;
    }
 
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