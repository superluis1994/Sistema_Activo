<?php
require_once "conexion.php";
class sqlReg extends Principal {

    public function loguiar($dato){
        $clave=Principal::encryption($dato["pass"]);
        $sql=Principal::conectar()->prepare("SELECT COUNT(*) FROM  usuario WHERE id_user = :CODIGO && passw = :PASSWD ;");
        $sql->bindParam(":CODIGO",$dato['codigo']); 
        $sql->bindParam(":PASSWD",$clave); 
       $sql->execute();
       $count=$sql->fetchColumn();
       return $count;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////parte del usuario////////////////////////////////////////////////////    
////////////////////////////////////////////////////////////////////////////////////////////////
// obteneter datos usuario
    public function Datos_usuario($dato){
        $clave=Principal::encryption($dato["pass"]);
        $sql=Principal::conectar()->prepare("SELECT * FROM  usuario WHERE id_user = :CODIGO && passw = :PASSWD ;");
        $sql->bindParam(":CODIGO",$dato['codigo']); 
        $sql->bindParam(":PASSWD",$clave); 
       $sql->execute();
       $dat=$sql->fetch(PDO::FETCH_ASSOC);
       return $dat;
    }
    // restablecer contraseña paso1
    public function restClave($dato){
        $sql=Principal::conectar()->prepare("SELECT * FROM  usuario WHERE id_user = :CODIGO ");
        $sql->bindParam(":CODIGO",$dato); 
       $sql->execute();
       $dat=$sql->fetch(PDO::FETCH_ASSOC);
       return $dat;
    }
   //  validar clave actual
   public function valClaveActual($dato){
      $clave=Principal::encryption($dato["passw"]);
      $sql=Principal::conectar()->prepare("SELECT COUNT(*) FROM usuario  WHERE id_user =".$dato["id"]." && passw = '".$clave."';");
      $sql->execute();
      $count=$sql->fetchColumn();
      return $count;
   }
    //  Cambiar  clave actual
    public function CambiarClaveActual($dato){
      $clave=Principal::encryption($dato["passw"]);
      $sql=Principal::conectar()->prepare("UPDATE usuario SET passw = '".$clave."' WHERE id_user = '".$dato["id"]."';");
      $sql->execute();
      $count=$sql->rowCount();
      return $count;
   }

    // validarUsuario
    public function validarUsuario($dato){
        $sql=Principal::conectar()->prepare("SELECT COUNT(*) FROM  usuario WHERE id_user = :CODIGO ");
        $sql->bindParam(":CODIGO",$dato); 
       $sql->execute();
       $count=$sql->fetchColumn();
       return $count;
    }
 
    //lista de usuarios
    public function ListTipoUsuario($dato){
        $sql=Principal::conectar()->prepare("SELECT * FROM ".$dato);
       $sql->execute();
       $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
       return $dat;
    }
     //lista de usuarios
     public function busquedaFiltro($dato){
        $sql=Principal::conectar()->prepare("SELECT * FROM ".$dato["tabla"]." WHERE ".$dato["filtro"]." like '".$dato["busqueda"]."%'");
       $sql->execute();
       $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
       return $dat;
  
    }
    public function ListJefes($dato){
        $sql=Principal::conectar()->prepare("SELECT * FROM ".$dato.";");
       $sql->execute();
       $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
       return $dat;
    }
    public function actualizarEstadoUser($dato){
       $sql=Principal::conectar()->prepare("UPDATE usuario SET account_status_id = ".$dato["estado"]." WHERE id_user =".$dato["carnet"]." ;");
    //    $sql->bindParam(":CARNET",$dato['carnet']); 
    //    $sql->bindParam(":ESTADO",$dato['estado']);
       $sql->execute();
    //    $f=$sql->rowCount();
       return $sql;
    }
    public function AddUsuario($dato){
        //funcion 1 = insertar
        //funcion 2 = es igual actualizar
        // CALL crubusuario(funcion,codigo,"Contraseña","nombre","foto",estatus,rol o tipo usuario)
       
        $clave=Principal::encryption($dato["contrasena"]);
        $sql=Principal::conectar()->prepare("CALL crubusuario(:ACCION,:CODIGO,:PASSW,:NOMBRE,:APELLIDO,:CORREO,:FOTO,1,:ESTADO)");
        $sql->bindParam(":FOTO",$dato['foto']); 
        $sql->bindParam(":ACCION",$dato['accion']); 
        $sql->bindParam(":NOMBRE",$dato['nombre']);
        $sql->bindParam(":APELLIDO",$dato['apellidos']);
        $sql->bindParam(":CORREO",$dato['correo']);
        $sql->bindParam(":PASSW",$clave);
        $sql->bindParam(":CODIGO",$dato['codigo']);
        $sql->bindParam(":ESTADO",$dato['estado']);
        $sql->execute();
        return $sql;
        }
          //insertar permisos
       public function PermisosInsert($datos){
       $sql=Principal::conectar()->prepare("INSERT INTO permisos (registrar_usu, list_usu, conexion, mover_activos, list_movimiento_activo, regist_producto, mostr_producto, regist_local,mostr_local, id_user)
      VALUES ('".$datos['registrar_usu']."','".$datos['list_usu']."','".$datos['conexion']."','".$datos['mover_activo']."','".$datos['list_movimiento_activos']."','".$datos['regist_producto']."','".$datos['mostr_producto']."','".$datos['regist_local']."','".$datos['mostr_local']."','".$datos['codigo']."');");
       $sql->execute();
       return $sql;
      
    }
     
    public function List($dato){
        $sql=Principal::conectar()->prepare("SELECT * FROM ".$dato["tabla"]."  WHERE id_user =".$dato["id"]);
        $sql->execute();
        $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
        return $dat;
     }
   
    
}


?>