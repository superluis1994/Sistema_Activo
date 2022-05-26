<?php
$resl="";

// echo json_encode("si");
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();

// acciones de registrar usuario
if(isset($_POST["accion"])){

  
  if($_POST["accion"]=='tipoUserLits'){
         
      $list=$procesoDatos->ListTipoUsuario();
      $resl.="<option selected>Open this select menu</option>";
      foreach($list as $key => $value){
      
        $resl.="<option value='".$value["id_rol"]."'>".strtoupper($value["rol"])."</option>";
      
        
      }
      echo json_encode($resl);
  }
  else if($_POST["accion"]=='RegistrarUsuario'){


       $foto="img/recursos/foto_default.jpg";
    if($_FILES['foto']["name"] != null){

      //prceso de guardar la foto del usuario para
       // cargar imagenes
       $image_name = $_FILES['foto']['name'];
       $image_temp = $_FILES['foto']['tmp_name'];
       $image_size = $_FILES['foto']['size'];
       
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



    $dato=[
      'accion'=>1,
      'foto'=>$foto,
      'nombre'=>$_POST["nombre"],
      'apellidos'=>$_POST["apellidos"],
      'correo'=>$_POST["correo"],
      'contrasena'=>$_POST["passw"],
      'codigo'=>$_POST["codigo"],
      'estado'=>$_POST["tipo"]
  ];
     $insert=$procesoDatos->AddUsuario($dato);
    echo json_encode($insert);

  }
  else if($_POST["accion"]=='validarUser'){
    $resul=$procesoDatos->validarUsuario($_POST["codigo"]);

      echo json_encode($resul); 

  }

  
}


  

  

?>