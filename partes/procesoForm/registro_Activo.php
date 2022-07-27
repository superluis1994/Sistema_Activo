<?php
date_default_timezone_set('america/el_salvador');
// echo json_encode("si");
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();
session_start();
if(isset($_POST["accion"])){

    if($_POST["accion"]=="selectPartActivo"){

        ///////////////usuarios/////////////////
    $list2=$procesoDatos->ListGenerica("usuario");
    $list_usuario="<option value='0' selected>SELECCIONAR....</option>";
    foreach($list2 as $key => $value){
    
      $list_usuario.="<option value='".$value["id_user"]."'>".strtoupper($value["nom"])." ".strtoupper($value["apellidos"])." (".strtoupper($value["id_user"]).") </option>";
    
      
    }

  /////////////locales////////////////////////////////
  $list3=$procesoDatos->ListGenerica("local");
  $list_Local="<option value='0' selected>SELECCIONAR....</option>";
  foreach($list3 as $key => $value){
  
    $list_Local.="<option value='".$value["id_local"]."'>".strtoupper($value["local_name"])." </option>"; 
  }
   /////////////locales////////////////////////////////
   $list3=$procesoDatos->ListGenerica("tipo_activo");
   $list_Tactivo="<option value='0' selected>SELECCIONAR....</option>";
   foreach($list3 as $key => $value){
   
     $list_Tactivo.="<option value='".$value["id_tipo_activo"]."'>".strtoupper($value["nom_tipo_activo"])." </option>";
   
     
   }
  $SelectRest = [
    "usuario"=> $list_usuario,
    "locales"=>$list_Local,
    "Tactivo"=>$list_Tactivo,
 
  ];

    echo json_encode($SelectRest);

    
    }
    if($_POST["accion"]=="validarActivo"){
    $codA=remove_Caracteres($_POST["codigo"]);
         
        $valActi=$procesoDatos->validarActivo($codA);
        $rest = [];
        if($valActi == 0){
            $rest = [
                "dato1"=> "is-valid",
                "dato2"=>"is-invalid"  
              ];
        }else{
            $rest = [
                "dato1"=> "is-invalid",
                "dato2"=>"is-valid"
              ];
        }
    echo json_encode($rest);



    }
    if($_POST["accion"]=="RGactivo"){
          $marca="N/s";
          $modelo="N/s";
          $dimension="N/s";
        $foto="img/recursos/foto_default.jpg";
        if($_FILES['fot']["name"] != null){
    
          //prceso de guardar la foto del usuario para
           // cargar imagenes
           $image_name = $_FILES['fot']['name'];
           $image_temp = $_FILES['fot']['tmp_name'];
           $image_size = $_FILES['fot']['size'];
           
           //quitamos el nombre que trae por defecto
           $exp = explode(".", $image_name);
           $ext = end($exp);
           $imagen='a'.time().'.'.$ext;
           $def= addslashes(file_get_contents($image_temp));
          
           //  //mover la foto a esta ruta :D
            $ruta="../../img/imgPerfil/".$imagen;
            move_uploaded_file($image_temp,$ruta);
            //  echo json_encode();
            $foto="img/imgPerfil/".$imagen;
        }
        if($_POST["ACmarca"] != ""){
            $marca=strtoupper($_POST["ACmarca"]);      
        }if($_POST["ACmodelo"] != ""){  
            $modelo=strtoupper($_POST["ACmodelo"]);
        }if($_POST["ACdimensiones"] != ""){
          $dimension=$_POST["ACdimensiones"];
        }


        $inserAct = [
            "foto"=> $foto,
            "codigo"=> $_POST["ACcodigo"],
            "nombre"=> strtoupper($_POST["ACnombre"]),
            "tipoAct"=> $_POST["tipoAct"],
            "color"=> strtoupper($_POST["ACColor"]),
            "ValorR"=> $_POST["ACvalor"],
            "marca"=> $marca,
            "modelo"=> $modelo,
            "dimension"=> $dimension,
            "serie"=> $_POST["ACserieActivo"],
            "vidaU"=> $_POST["ACvidaUti"],
            "localP"=> $_POST["localPert"],
            "responsable"=> $_POST["responsable"],
            "codInterno"=> $_POST["ACinterno"],
            "CodMined"=> $_POST["ACmined"],
            "decripcion"=> ucfirst(strtolower($_POST["descrip"])),
            "fechaR"=>date('Y-m-d')
          ];

    //    if($_POST["tipoInser"] == "TECNOLOGICO"){

    //    }else{

    //    }
     $insertA=$procesoDatos->RegaActivo($inserAct);
     $rest=[];
     if($insertA == 1){
        $rest = [
            "icono"=> "success",
            "titulo"=>"Exitosamente",
            "mensaje"=>"Su Activo se registro con exito"
          ];
     }
     else{
        $rest = [
            "icono"=> "error",
            "titulo"=>"Error",
            "mensaje"=>"No se pudo registrar"
          ];
     }

    echo json_encode($rest);


    }




}
function remove_Caracteres($str) {
    $result = str_replace(array("$","#", ":","'", ";"), '', $str);
    return $result;
}


?>