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
        'list_usu'=>"off",
        'conexion'=>"off",
        'mover_activo'=>"off",
        'list_movimiento_activos'=>"off",
        'regist_producto'=>"on",
        'mostr_producto'=>"on",
        'regist_local'=>"on",
        'mostr_local'=>"on"
      ];
      
    }

    $insertPermiso=$procesoDatos->PermisosInsert($permisosUser);
  }

  
  echo json_encode("success");


   

  }
  else if($_POST["accion"]=='validarUser'){
    $resul=$procesoDatos->validarUsuario($_POST["codigo"]);

      echo json_encode($resul); 

  }
  else if($_POST["accion"]=='list_usuario_table'){
    $list_user=$procesoDatos->ListTipoUsuario("usuario limit 0,".$_POST["cantida"].";");
    $res="";
    foreach($list_user as $key => $value){
      
      $res.="<tr>";
      $res.="<th scope='row' class='text-center'> <img src='".$value["photo"]."' alt='' height='40' width='40'> </th>
      <td>".$value["id_user"]."</td>
      <td>".$value["nom"]."</td>
      <td>".$value["apellidos"]."</td>
      <td>".$value["correo"]."</td>";

      if($_SESSION["datos"][$_COOKIE["id"]][5]==1){

        if($value["account_status_id"]==1){
          
          $res.="<td><button type='button' value='".$value["id_user"].",".$value["account_status_id"]."' id='btn-statu' class='btn btn-danger'>Desactivar</button></td>";
        }
        else if($value["account_status_id"]==2){
          $res.="<td><button type='button' value='".$value["id_user"].",".$value["account_status_id"]."' id='btn-statu' class='btn btn-success'>Activar</button></td>";

        }
        $res.="<td><button type='button' id='btn-modificar' value='".$value["photo"].",".$value["id_user"].",".$value["nom"].",".$value["apellidos"].",".$value["correo"]."' class='btn btn-primary'>Modificar</button></td>";

      }
     
      $res.="</tr>";      
    }

    echo json_encode($res);

  }
  // cambiar el estado de activo a desactivo o viceversa
  else if($_POST["accion"]=='estado'){

    $val1=filter_var($_POST["stC"], FILTER_SANITIZE_NUMBER_INT );
    $val2=filter_var($_POST["stV"], FILTER_SANITIZE_NUMBER_INT );
    $estatus=0;
    if($val2==1){
        $estatus=2;
    }
    if($val2==2){
      $estatus=1;
  }
    $datos=[
      'carnet'=>$val1,
      'estado'=>$estatus
    ];
    $rest=$procesoDatos->actualizarEstadoUser($datos);
    echo json_encode($rest);

  }
  else if($_POST["accion"]=='buscarUser'){

    $tipo="";
    //  evaluar tipo de busqueda
    if($_POST["filtro"]=="carnet"){
      $tipo="id_user";

    }else if($_POST["filtro"]=="nombre"){
      $tipo="nom";
      
    }
    else if($_POST["filtro"]=="apellido"){
      $tipo="apellidos";
      
    }


    $datos=[
      'filtro'=>$tipo,
      'busqueda'=>$_POST["busqueda"],
      'tabla'=>"usuario"
    ];

    $list_user=$procesoDatos->busquedaFiltro($datos);
    $res="";
    foreach($list_user as $key => $value){
      
      $res.="<tr>";
      $res.="<th scope='row' class='text-center'> <img src='".$value["photo"]."' alt='' height='40' width='40'> </th>
      <td>".$value["id_user"]."</td>
      <td>".$value["nom"]."</td>
      <td>".$value["apellidos"]."</td>
      <td>".$value["correo"]."</td>";

      if($_SESSION["datos"][$_COOKIE["id"]][5]==1){

        if($value["account_status_id"]==1){
          
          $res.="<td><button type='button' value='".$value["id_user"].",".$value["account_status_id"]."' id='btn-statu' class='btn btn-danger'>Desactivar</button></td>";
        }
        else if($value["account_status_id"]==2){
          $res.="<td><button type='button' value='".$value["id_user"].",".$value["account_status_id"]."' id='btn-statu' class='btn btn-success'>Activar</button></td>";

        }
        $res.="<td><button type='button' id='btn-modificar' value='".$value["photo"].",".$value["id_user"].",".$value["nom"].",".$value["apellidos"].",".$value["correo"]."' class='btn btn-primary'>Modificar</button></td>";

      }
     
      $res.="</tr>";      
    }

    echo json_encode($res);

  }
  else if($_POST["accion"]=='CerrarSession'){

    
  unset($_SESSION['datos'][$_COOKIE['id']]);
  setcookie(
    $name= "id",
    $value = "",
    $expires = 0,
    $path = "/",
    $domain = "localhost",
    $secure = false,
    $httponly = false);


   echo json_encode(Ruta);

  }

  


  
}


  

  

?>