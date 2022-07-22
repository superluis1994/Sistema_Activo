<?php
require_once "conexion.php";
class sqlReg extends Principal {

    public function loguiar($dato){
        $clave=Principal::encryption($dato["pass"]);
        $sql=Principal::conectar()->prepare("SELECT COUNT(*) FROM  usuario WHERE id_user = :CODIGO && passw = :PASSWD ;");
      //   return $sql;
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
        $sql=Principal::conectar()->prepare("SELECT * FROM ".$dato["tabla"]." WHERE ".$dato["filtro"]." like '".$dato["busqueda"]."%' limit 0,20");
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
        $sql=Principal::conectar()->prepare("INSERT INTO usuario (id_user, passw, nom,apellidos,correo, photo, account_status_id, rol_id,Centro_costo)
        VALUES(:CODIGO,:PASSW,:NOMBRE,:APELLIDO,:CORREO,:FOTO,:ESTADO,:TIPO,:COSTO)");
        $sql->bindParam(":FOTO",$dato['foto']); 
        $sql->bindParam(":NOMBRE",$dato['nombre']);
        $sql->bindParam(":APELLIDO",$dato['apellidos']);
        $sql->bindParam(":CORREO",$dato['correo']);
        $sql->bindParam(":PASSW",$clave);
        $sql->bindParam(":CODIGO",$dato['codigo']);
        $sql->bindParam(":TIPO",$dato['tipo']);
        $sql->bindParam(":ESTADO",$dato['estado']);
        $sql->bindParam(":COSTO",$dato['costo']);
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
      $sql=Principal::conectar()->prepare("SELECT * FROM ".$dato["tabla"]." LIMIT ".$dato["inferior"]." , ".$dato["superior"].";");
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
  ////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////movimiento session////////////////////
   //lista de usuarios
   public function busquedInfActi($dato){
      $sql=Principal::conectar()->prepare("SELECT * FROM ".$dato["tabla"]." WHERE ".$dato["campo"]." = ".$dato["codigo"]." && id_local = '".$dato["local"]."'");
     $sql->execute();
     $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
     return $dat;
  }


  ///////////////////////movimientos//////////////////////////////////////////////////////////////////
  public function RegdatosMovimiento($dato){
      $sql=Principal::conectar();
      $resp=$sql->prepare("INSERT INTO list_movimientos (id_tipo_mov,id_user_entrega,id_user_recibe,id_local_salida,id_local_destino,justi_mov,fecha_mov,hora_mov)  
      VALUES('".$dato["tipoMovi"]."','".$dato["Entrega"]."','".$dato["Recibe"]."','".$dato["localSalida"]."','".$dato["localDestino"]."','".$dato["justificacion"]."','".$dato["fecha"]."','".$dato["hora"]."') ;");
      $resp->execute();
      $dat=$sql->lastInsertId();
      $sql->beginTransaction();
      $sql->commit();
  //   $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
  return $dat;
  
}
///////////////////////////////////////parte inventario//////////////////////////////////////////

// validar Activo
public function validarActivo($dato){
  $sql=Principal::conectar()->prepare("SELECT COUNT(*) FROM  inventario WHERE id_activo = :CODIGO ");
  $sql->bindParam(":CODIGO",$dato); 
 $sql->execute();
 $count=$sql->fetchColumn();
 return $count;
}
// Registrar Activo
public function RegaActivo($dato){
   $sql=Principal::conectar()->prepare("insert into  inventario  ( id_activo , codigo_mined , codigo_interno ,
   nom_activo , tipo_activo , descrip_activo , valor_activo , marca ,modelo , dimensiones , serie , vida_util , id_local , id_reposable , foto , fecha_resg )
	VALUES (:CODIGO, :CODMINED, :CODINTER, :NOM, :TIPOACT, :DESCRIP, :VALORR, 
           :MARCA, :MODELO, :DIMEN, :SERIE, :VIDA, :LOC_PERTE, :RESPOSABLE, :FOTO, :FECH);");
   $sql->bindParam(":CODIGO",$dato["codigo"]); 
   $sql->bindParam(":CODMINED",$dato["CodMined"]); 
   $sql->bindParam(":CODINTER",$dato["codInterno"]); 
   $sql->bindParam(":NOM",$dato["nombre"]); 
   $sql->bindParam(":TIPOACT",$dato["tipoAct"]); 
   $sql->bindParam(":DESCRIP",$dato["decripcion"]); 
   $sql->bindParam(":VALORR",$dato["ValorR"]); 
   $sql->bindParam(":MARCA",$dato["marca"]); 
   $sql->bindParam(":MODELO",$dato["modelo"]); 
   $sql->bindParam(":DIMEN",$dato["dimension"]); 
   $sql->bindParam(":SERIE",$dato["serie"]); 
   $sql->bindParam(":VIDA",$dato["vidaU"]); 
   $sql->bindParam(":LOC_PERTE",$dato["localP"]); 
   $sql->bindParam(":RESPOSABLE",$dato["responsable"]); 
   $sql->bindParam(":FOTO",$dato["foto"]); 
   $sql->bindParam(":FECH",$dato["fechaR"]); 
  

  $sql->execute();
  $dat=$sql->rowCount();
      return $dat;
 }
   //consulta generica
   public function sqlConsulta($dato){
      $sql=Principal::conectar()->prepare($dato);
     $sql->execute();
   //   $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
     return $sql;
  }

  public function detalle(){
   $sql=Principal::conectar()->prepare("SELECT id_lis_mov AS id_mov,user_entrega.nom AS usuario_entrega, user_recibe.nom AS usuario_recibe,tipo_mov AS tipo,
   local_salida.local_name AS local_sal,local_destino.local_name AS local_dest,fecha_mov AS fecha,hora_mov AS hora_mov,
justi_mov AS justi
   FROM list_movimientos 
   INNER JOIN usuario AS user_entrega ON list_movimientos.id_user_entrega = user_entrega.id_user
   INNER JOIN usuario AS user_recibe ON list_movimientos.id_user_recibe = user_recibe.id_user
   INNER JOIN tipo_movimiento ON list_movimientos.id_tipo_mov = tipo_movimiento.id_mov
   INNER JOIN `local` AS local_salida ON list_movimientos.id_local_salida = local_salida.id_local
   INNER JOIN `local` AS local_destino ON list_movimientos.id_local_destino = local_destino.id_local");
  $sql->execute();
  $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
  return $dat;
}
  //lista de usuarios
  public function listaPersonalizada($dato){
   $sql=Principal::conectar()->prepare("SELECT * FROM ".$dato["tabla"]." WHERE ".$dato["campo"]." = ".$dato["codigo"]." ;");
  $sql->execute();
  $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
  return $dat;
}
    
}


?>