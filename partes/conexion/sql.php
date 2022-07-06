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
     //  Registrar conexion de usuario loguiado
     public function registrarConexion($dato){
      $sql=Principal::conectar()->prepare("INSERT INTO conexiones(id_user, fecha, hora)
      VALUES('".$dato["codigo"]."','".$dato["fecha"]."','".$dato["hora"]."');");
      $sql->execute();
      $count=$sql->rowCount();
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
     //lista de usuarios por busqueda de filtros
     public function busquedaFiltro($dato){
        $sql=Principal::conectar()->prepare("SELECT * FROM ".$dato["tabla"]." WHERE ".$dato["filtro"]." like '".$dato["busqueda"]."%'");
       $sql->execute();
       $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
       return $dat;
  
    }
    public function ListGenerica($dato){
        $sql=Principal::conectar()->prepare("SELECT * FROM ".$dato.";");
       $sql->execute();
       $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
       return $dat;
    }
    public function actualizarEstadoUser($dato){
       $sql=Principal::conectar()->prepare("UPDATE usuario SET account_status_id = ".$dato["estado"]." WHERE id_user =".$dato["carnet"]." ;");
       $sql->execute();
    //    $f=$sql->rowCount();
       return $sql;
    }
    public function AddUsuario($dato){
        //funcion 1 = insertar
        //funcion 2 = es igual actualizar
        // CALL crubusuario(funcion,codigo,"Contraseña","nombre","foto",estatus,rol o tipo usuario)
       
        $clave=Principal::encryption($dato["contrasena"]);
        $sql=Principal::conectar()->prepare("INSERT INTO usuario (id_user, passw, nom,apellidos,correo, photo, account_status_id, rol_id)
        VALUES(:CODIGO,:PASSW,:NOMBRE,:APELLIDO,:CORREO,:FOTO,:ESTADO,:TIPO)");
        $sql->bindParam(":FOTO",$dato['foto']); 
        $sql->bindParam(":NOMBRE",$dato['nombre']);
        $sql->bindParam(":APELLIDO",$dato['apellidos']);
        $sql->bindParam(":CORREO",$dato['correo']);
        $sql->bindParam(":PASSW",$clave);
        $sql->bindParam(":CODIGO",$dato['codigo']);
        $sql->bindParam(":TIPO",$dato['tipo']);
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
   //   seccion local
   public function insertLocal($dato){
      $sql=Principal::conectar()->prepare("INSERT INTO `local` (id_local, local_name, jefe_local, estatus, fecha_regis, registradoX)
      VALUES('".$dato["codigo"]."','".$dato["nombre"]."','".$dato["responsable"]."','".$dato["estatus"]."','".$dato["fecha"]."','".$dato["id_user"]."');");
      $sql->execute();
      $dat=$sql->rowCount();
      return $dat;
   }
   public function tablas($dato){
      $sql=Principal::conectar()->prepare("SELECT * FROM ".$dato["tabla"]." LIMIT ".$dato["inferior"].", ".$dato["superior"].";");
      $sql->execute();
      $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
      return $dat;
   }
     // validarUsuario
     public function validarLocal($dato){
      $sql=Principal::conectar()->prepare("SELECT COUNT(*) FROM  local WHERE id_local = :CODIGO ");
      $sql->bindParam(":CODIGO",$dato); 
     $sql->execute();
     $count=$sql->fetchColumn();
     return $count;
  }
   
    
}


?>