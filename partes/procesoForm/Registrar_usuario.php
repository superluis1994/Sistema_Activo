<?php
$resl="";

// echo json_encode("si");
require_once "../conexion/sql.php";
require_once "../credenciale/datos.php";
$procesoDatos= new sqlReg ();
session_start();

// acciones de registrar usuario
if(isset($_POST["accion"])){

  
  if($_POST["accion"]=='tipoUserLits'){
         
      $list=$procesoDatos->ListTipoUsuario("roles");
      $resl.="<option value='0' selected>Seleccionar</option>";
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
      'foto'=>$foto,
      'nombre'=>strtoupper($_POST["nombre"]),
      'apellidos'=>strtoupper($_POST["apellidos"]),
      'correo'=>$_POST["correo"],
      'contrasena'=>$_POST["pas"],
      'codigo'=>$_POST["codigo"],
      'tipo'=>$_POST["tipo"],
      'costo'=>$_POST["Ccosto"],
      'estado'=>1
    ];
    $insert=$procesoDatos->AddUsuario($dato);

     $permisosUser=[];
     if($insert){
       if($_POST["tipo"]==1){
         $permisosUser=[
           'codigo'=>$_POST["codigo"],
           'registrar_usu'=>"on",
           'list_usu'=>"on",
           'conexion'=>"on",
           'mover_activo'=>"on",
           'list_movimiento_activos'=>"on",
           'regist_producto'=>"on",
           'mostr_producto'=>"on",
           'regist_local'=>"on",
           'mostr_local'=>"on"
          ];
          
        }else if($_POST["tipo"]==2){
      $permisosUser=[
        'codigo'=>$_POST["codigo"],
        'registrar_usu'=>"off",
        'list_usu'=>"on",
        'conexion'=>"off",
        'mover_activo'=>"off",
        'list_movimiento_activos'=>"off",
        'regist_producto'=>"off",
        'mostr_producto'=>"on",
        'regist_local'=>"off",
        'mostr_local'=>"on"
      ];
      
    }

    $insertPermiso=$procesoDatos->PermisosInsert($permisosUser);


   
    
    $alerta=["icono"=>"success",
    "titulo"=>"Correcto",
    "mensaje"=>"Registrado Correctamente",
    "recargar"=>"si"
  ];
    
    
  }else{
    
    $alerta=["icono"=>"error",
    "titulo"=>"Error",
    "mensaje"=>"Llenar todos los campos",
    "recargar"=>"no"
  ];
  } 
  echo json_encode($alerta);

  }
  else if($_POST["accion"]=='validarUser'){
    $resul=$procesoDatos->validarUsuario($_POST["codigo"]);

      echo json_encode($resul); 

  }
 
  
}


  

  

?>