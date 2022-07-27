<?php
$resl="";

date_default_timezone_set('america/el_salvador');
// echo json_encode("si");
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();
session_start();
// acciones de registrar usuario
if(isset($_POST["accion"])){
  if($_POST["accion"]=="RegistrarMovimiento"){
    //  $ids=[];
    $lu="";
   
   $dato=[
    "Entrega"=>$_POST["usuarioEntre"],
    "Recibe"=>$_POST["usuarioRecibe"],
    "localSalida"=>$_POST["localSali"],
    "localDestino"=>$_POST["localDes"],
    "tipoMovi"=>$_POST["Tmov"],
    "justificacion"=>ucfirst(strtolower($_POST["justificacion"])),
    'fecha'=>date('Y-m-d'),
    'hora'=>date('h:i:s')
  ];
   $idInsert=$procesoDatos->RegdatosMovimiento($dato);
                echo json_encode($idInsert);
   
   if($idInsert!=0){

          $string="";
          $string2="";
      foreach($_SESSION[$_COOKIE['id']] as $key=>$value){
        if($_COOKIE['id'] == $value[0]){
          $string.=$key.",";

        }
            
      }

      if($string == ""){

      }else{
       
          $string2=trim($string,",");  
          $arrayAd=explode(",", $string2);

          $inserSql="INSERT INTO detalle_movimientos (id_mov,id_activos) VALUES(".$idInsert.",'".$string2."');";
          $inserRest=$procesoDatos->sqlConsulta($inserSql);

                $sqllis="";
                 foreach($arrayAd as $key){
                  $sqllis.="UPDATE inventario SET id_local = '".$_POST["localDes"]."' WHERE id_activo = '".$key."';";
                }
                
                $updateInve=$procesoDatos->sqlConsulta($sqllis);
                // json_encode($updateInve);
      }


               
  }
      

    // foreach ($_SESSION['actList'] as $key => $value){
    //   if($value[0]==$_COOKIE["id"]){
    //       // $ids=$_SESSION['actList'][$key];
    //       $lu.=$key;
    //   }
    // }

  
  }


  ////////////////////cargar los select////////////////////////////////////////////////
  else if($_POST["accion"]=="select"){

    // eleiminar session deactivos de movimientos
    if(isset($_SESSION[$_COOKIE['id']])){
       
            unset($_SESSION[$_COOKIE['id']]);      
    }
/////////tipo de movimiento///////////////
    $list1=$procesoDatos->ListGenerica("tipo_movimiento");
    $tipo_movimiento="<option value='0' selected>SELECCIONAR....</option>";
    foreach($list1 as $key => $value){
    
      $tipo_movimiento.="<option value='".$value["id_mov"]."'>".strtoupper($value["tipo_mov"])."</option>";
    
      
    }
///////////////usuarios/////////////////
    $list2=$procesoDatos->ListGenerica("usuario");
    $list_usuario="<option value='0' selected>SELECCIONAR....</option>";
    foreach($list2 as $key => $value){
    if($value["account_status_id"] == 1){

      $list_usuario.="<option value='".$value["id_user"]."'>".strtoupper($value["nom"])." ".strtoupper($value["apellidos"])." (".strtoupper($value["id_user"]).") </option>";
    }
    
      
    }


  /////////////locales////////////////////////////////
  $list3=$procesoDatos->ListGenerica("local");
  $list_Local="<option value='0' selected>SELECCIONAR....</option>";
  foreach($list3 as $key => $value){
  
    $list_Local.="<option value='".$value["id_local"]."'>".strtoupper($value["local_name"])." </option>";
  
    
  }
  $SelectRest = [
    "usuario"=> $list_usuario,
    "locales"=>$list_Local,
    "tipoMov"=> $tipo_movimiento,
 
  ];

    echo json_encode($SelectRest);

  }

 
  elseif($_POST["accion"]=="informacionActivo"){

    $cod=remove_Caracteres($_POST["codigoActivo"]);
    $local=remove_Caracteres($_POST["localP"]);
    $dato = [
      "codigo"=> $cod,
      "tabla"=> "inventario",
      "campo"=> "id_activo",
      "local"=> $local,
   
    ];
$tabla="";
    $resp=$procesoDatos->busquedInfActi($dato);
    foreach($resp as $key => $value){
      $tabla.="<div class='row g-0'>
    <div class='col-md-4'>
      <img src='".$value["foto"]."' class='img-fluid rounded-start'  alt='...'>
    </div>
    <div class='col-md-8'>
    <div class='card-body'>
    <h5 class='card-title'><b>Nombre:</b> ".$value["nom_activo"]."</h5>
    <p class='card-text'><b>ID:</b> ".$value["id_activo"]."</p>
    <p class='card-text'><b>SERIE:</b> ".$value["serie"]."</p>
    <p class='card-text'><b>DESCRIPCION:</b> ".$value["descrip_activo"]."</p>
    <div class='d-grid gap-2'>
    <button type='button' name='' value='".$value["nom_activo"].",".$value['id_activo'].",".$value["serie"]."' id='btn-agre' class='btn btn-primary'>Agregar</button>
    </div>
    </div>
    </div>
    </div>";
    
    
    
  }
  echo json_encode($tabla);

         
  }else if($_POST["accion"]=="prueba"){
    echo json_encode($_POST["usuarioEntre"]);
    // echo json_encode("$('#listActi').modal('show')");

    // $('#listActi').modal('show');

   
    
  }

}
// cree esta funcion para limpiar los texto de caulquier caracter peligroso en sql
function remove_Caracteres($str)
{
    $result = str_replace(array("#", ":","'", ";"), '', $str);
    return $result;
}


?>