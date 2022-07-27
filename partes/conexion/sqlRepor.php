<?php
require_once "conexionRepor.php";
class sqlReg extends Principal {

   public function DatosRepor($dato){
      $sql=Principal::conectar()->prepare("SELECT ".$dato["dato"]." FROM ".$dato["tabla"]." WHERE ".$dato["campo"]." = ".$dato["id"]);
      // $sql->bindParam(":CODIGO",$dato["id"]); 
     $sql->execute();
     $dat=$sql->fetch(PDO::FETCH_ASSOC);
     return $dat;
  }
  public function listDeACtivoMov($dato){
   $sql=Principal::conectar()->prepare("SELECT ".$dato["dato"]." FROM ".$dato["tabla"]." WHERE ".$dato["campo"]." = ".$dato["id"]);
  $sql->execute();
  $dat=$sql->fetch(PDO::FETCH_ASSOC);
  return $dat;
}
    
}


?>