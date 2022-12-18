<?php
$resl="";
session_start();
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();


if(isset($_POST["accion"])){

    if($_POST["accion"] == "tabla_list_activo"){

      $sql="Select id_activo,codigo_mined,codigo_interno,nom_activo,nom_tipo_activo,descrip_activo,
      valor_activo,marca,modelo,dimensiones,serie,vida_util,local_name,nom,apellidos,foto,fecha_resg
       FROM inventario 
       INNER JOIN tipo_activo ON inventario.tipo_activo = tipo_activo.id_tipo_activo
       INNER JOIN `local` ON inventario.id_local = `local`.id_local
       INNER JOIN usuario ON inventario.id_reposable = usuario.id_user";
    
       $all_information=$procesoDatos->sqlGenericaArreglo($sql);
    // $fill=$procesoDatos->listaActivos(); 
     $inicio=$_POST["num_limit"]-50;
     $fin=$_POST["num_limit"];
    $query="Select id_activo,codigo_mined,codigo_interno,nom_activo,nom_tipo_activo,descrip_activo,
      valor_activo,marca,modelo,dimensiones,serie,vida_util,local_name,nom,apellidos,foto,fecha_resg
       FROM inventario 
       INNER JOIN tipo_activo ON inventario.tipo_activo = tipo_activo.id_tipo_activo
       INNER JOIN `local` ON inventario.id_local = `local`.id_local
       INNER JOIN usuario ON inventario.id_reposable = usuario.id_user LIMIT ".$inicio.",".$fin;
    
     $fill=$procesoDatos->sqlGenericaArreglo($query);
     $getrow=count($procesoDatos->sqlGenericaArreglo($query));
    
     //$btn_report=$getrow;
   
     $btn_report="";
     if ($getrow < 3) {
      $btn_report="<button class='btn btn-danger disabled'>Reporte General</button>";
      }else{
       $btn_report="<a href='reportes/recporte_completo_activo.php?requireFeed=".$inicio.",".$fin."' class='btn btn-danger'>Reporte General</a>";
    
      }

      
     $paginas=count($all_information);

     $num_paginas=0;
     if ($paginas < 50) {
      $num_paginas=1;
     }else {
      $num_paginas=ceil($paginas/50);
     }

     $paginacion ="";
     // aqui creo los registros de paginacion fila por fila siempre y cuando la num pagina sea mayor a 2
     if($num_paginas > 1){
      /*
       $paginacion="<li class='page-item disabled'>
     <a class='page-link'  tabindex='-1' aria-disabled='true'>Previous</a>
     </li>";*/
     for($a=0;$a<$num_paginas;$a++){
       $numero=$a+1;
       $g=50*$numero;
       $paginacion.="<li class='page-item ' aria-current='page'>
       <a class='page-link active' name='".$g."' id='pagUser' >".$numero."</a>
       </li>";
     }
   /*  
     $paginacion.="<li class='page-item'>
  <a class='page-link' >Next</a>
  </li>";*/
   }
  
     $filas="";
     foreach($fill as $key => $value){
      
         $filas.="
         <tr>
         <th scope='row'>".$value["id_activo"]."</th>
         <td>".$value["nom_activo"]."</td>
         <td>".$value["nom_tipo_activo"]."</td>
         <td>".$value["nom"]." ".$value["apellidos"]."</td>
         <td>".$value["local_name"]."</td>";
      if($_SESSION["datos"][$_COOKIE["id"]][5]==1){

        $filas.=" <td><button type='button' id='detalleActi' value='".$value["id_activo"]."' class='btn btn-primary'>Detalles</button></td>
         <td><button type='button' id='update'  value='".$value["id_activo"]."' class='btn btn-primary'>Actualizar</button></td>
         <td><a class='btn btn-danger' href='reportes/reporte_general_activo.php?url=".$value['id_activo']."'>Reporte</a></td>";
      }
       $filas.="</tr>";
     }      
    $salida=[];
    $salida['tabla']=$filas;
    $salida['paginacion']=$paginacion;
    $salida['btn_report']=$btn_report;
    $salida['prueba']=$getrow;
    echo json_encode($salida);

    }
    else if($_POST["accion"] == "infAct"){
        $datos=[];
        $fil="";
      

        $rs=$procesoDatos->sqlGenericaArreglo("SELECT id_activo ,  codigo_mined, codigo_interno  , nom_activo 
        , nom_tipo_activo , descrip_activo , valor_activo , marca , modelo , dimensiones , serie , vida_util , local_name, nom,apellidos , foto , fecha_resg , color  
        FROM  inventario 
        INNER JOIN tipo_activo ON inventario.tipo_activo = tipo_activo.id_tipo_activo
        INNER JOIN `local` ON inventario.`id_local` = `local`.`id_local`
        INNER JOIN usuario ON inventario.`id_reposable` = usuario.`id_user` where id_activo = ".$_POST["id"]."
        ");

        $fil="";
        foreach($rs as $key=> $value){

        $fil.="<tr>
          <td><b>ID Activo</b></td>
            <td>".$value["id_activo"]."</td>
          </tr>
          <tr>
          <td><b>Codigo Mined</b></td>
          <td>".$value["codigo_mined"]."</td>
          </tr>
          <tr>
          <td><b>Serie</b></td>
          <td>".$value["serie"]."</td>
          </tr>
          <tr>
          <td><b>Codigo Interno</b></td>
          <td>".$value["codigo_interno"]."</td>
          </tr>
          <tr>
          <td><b>Tipo de Activo</b></td>
          <td>".$value["nom_tipo_activo"]."</td>
          </tr>
          <tr>
          <td><b>Color</b></td>
          <td>".$value["color"]."</td>
          </tr>
          <tr>
          <td><b>Valor $</b></td>
          <td>".$value["valor_activo"]."</td>
          </tr>
          <tr>
          <td><b>Marca</b></td>
          <td>".$value["marca"]."</td>
          </tr>
          <tr>
          <td><b>Dimensiones</b></td>
          <td>".$value["dimensiones"]."</td>
          </tr>
          <tr>
          <td><b>Vida Util</b></td>
          <td>".$value["vida_util"]."</td>
          </tr>
          <tr>
          <td><b>Pertenece</b></td>
          <td>".$value["local_name"]."</td>
          </tr>
          <tr>
          <td><b>Responsable</b></td>
          <td>".$value["nom"]." ".$value["apellidos"]."</td>
          </tr>
          <tr>
          <td><b>Fecha de Registro</b></td>
          <td>".$value["fecha_resg"]."</td>
          </tr>"; 
        }
       
        $datos=[
            "nombre"=>$rs[0]["nom_activo"],
            "descripcion"=>$rs[0]["descrip_activo"],
            "img"=>$rs[0]["foto"],
           "filas"=>$fil
        ];


    echo json_encode($datos);
        

    } else if($_POST["accion"] == "buscarfiltro"){
      $datos=[];
      //campos a consultar
      $columna=['id_activo','nom_activo','nom_tipo_activo'];
      //$campo=isset($_POST["buscar"]) ? : null;
      $campo=$_POST["buscar"];
      $where="";
     if($campo != null){
      $where.="(";
      for ($i=0; $i < count($columna) ; $i++) { 
        
        $where.= $columna[$i]." LIKE '%".$campo."%' OR ";
      }
      $where=substr_replace($where,"",-3);
      $where.=")";
     }

     $sql="Select id_activo,codigo_mined,codigo_interno,nom_activo,nom_tipo_activo,descrip_activo,
     valor_activo,marca,modelo,dimensiones,serie,vida_util,local_name,nom,apellidos,foto,fecha_resg
      FROM inventario 
      INNER JOIN tipo_activo ON inventario.tipo_activo = tipo_activo.id_tipo_activo
      INNER JOIN `local` ON inventario.id_local = `local`.id_local
      INNER JOIN usuario ON inventario.id_reposable = usuario.id_user WHERE ".$where."
      ";
      $getColums=count($procesoDatos->sqlGenericaArreglo($sql));
      
     $inicio=$_POST["num_limit"]-50; 
     $fin=$_POST["num_limit"];

      $query="Select id_activo,codigo_mined,codigo_interno,nom_activo,nom_tipo_activo,descrip_activo,
      valor_activo,marca,modelo,dimensiones,serie,vida_util,local_name,nom,apellidos,foto,fecha_resg
       FROM inventario 
       INNER JOIN tipo_activo ON inventario.tipo_activo = tipo_activo.id_tipo_activo
       INNER JOIN `local` ON inventario.id_local = `local`.id_local
       INNER JOIN usuario ON inventario.id_reposable = usuario.id_user WHERE ".$where."
      LIMIT  ".$inicio.",".$fin;
     
   
     //$btn_report=$where;
     // $sql="SELECT * FROM  inventario WHERE ".$where;
      $rs=$procesoDatos->sqlGenericaArreglo($query);
     $getrow=count($procesoDatos->sqlGenericaArreglo($query));

     $btn_report="";
     if ($getrow < 3) {
      $btn_report="<button class='btn btn-danger disabled'>Reporte General</button>";
      }else{
       $btn_report="<a href='areadereporte/prueba.php?requireFeed=".$inicio.",".$fin.",". $campo."' class='btn btn-danger'>Reporte General</a>";
    
      }

      if ($getColums < 50) {
        $num_paginas=1;
       }else {
        $num_paginas=ceil($getColums/50);
       }
      
       $next="";
       $paginacion ="";
       // aqui creo los registros de paginacion fila por fila siempre y cuando la num pagina sea mayor a 2
       if($num_paginas > 1){
        /*
         $paginacion="<li class='page-item disabled'>
       <a class='page-link'  tabindex='-1' aria-disabled='true'>Previous</a>
       </li>";*/
       for($a=0;$a<$num_paginas;$a++){
         $numero=$a+1;
         $g=50*$numero;
         $paginacion.="<li class='page-item ' aria-current='page'>
         <a class='page-link' name='".$g."' id='pagUser' >".$numero."</a>
         </li>";
         //$next=$g;
       }
       /*
       $paginacion.="<li class='page-item'>
    <a class='page-link' id='pageUser' name='".$next."' >Next</a>
    </li>";*/
     }

      $filas="";
      foreach($rs as $key => $value){
      
        $filas.="
        <tr>
        <th scope='row'>".$value["id_activo"]."</th>
        <td>".$value["nom_activo"]."</td>
        <td>".$value["nom_tipo_activo"]."</td>
        <td>".$value["nom"]." ".$value["apellidos"]."</td>
        <td>".$value["local_name"]."</td>";
     if($_SESSION["datos"][$_COOKIE["id"]][5]==1){

       $filas.=" <td><button type='button' id='detalleActi' value='".$value["id_activo"]."' class='btn btn-primary'>Detalles</button></td>
        <td><button type='button' id='update'  value='".$value["id_activo"]."' class='btn btn-primary'>Actualizar</button></td><td>
        <td><a class='btn btn-danger' href='reportes/reporte_general_activo.php?url=".$value['id_activo']."'>Reporte</a></td>";
     }
      $filas.="</tr>";
    }  
  
    
    $salida=[];
    $salida['tabla']=$filas;
    $salida['paginacion']=$paginacion;
    $salida['btn_report']=$btn_report;
    $salida['columnas']=$getColums;
   // $salida['cam']=;
  echo json_encode($salida);
      
  }else if($_POST["accion"] == "cargardatos_up"){
        $datos=[];
        $fil="";
      

        $rs=$procesoDatos->sqlGenericaArreglo("SELECT id_activo ,  codigo_mined, codigo_interno  , nom_activo 
        , nom_tipo_activo , descrip_activo , valor_activo , marca , modelo , dimensiones , serie , vida_util , local_name, nom,apellidos , foto , fecha_resg , color  
        FROM  inventario 
        INNER JOIN tipo_activo ON inventario.tipo_activo = tipo_activo.id_tipo_activo
        INNER JOIN `local` ON inventario.`id_local` = `local`.`id_local`
        INNER JOIN usuario ON inventario.`id_reposable` = usuario.`id_user` where id_activo = ".$_POST["id"]."
        ");
        foreach($rs as $key=> $value){

        $fil.="<tr>
        <td><b>ID Activo</b></td>
        <td><input type='text' readonly class='form-control' id='id_activo' value='".$value["id_activo"]."'></td>
        </tr>
        <tr>
          <td><b>Codigo Mined</b></td>
          <td><input type='text' class='form-control' id='codigo_mined' value='".$value["codigo_mined"]."'></td>
          </tr>
          <tr>
          <td><b>Serie</b></td>
          <td><input type='text' class='form-control ' id='serie' value='".$value["serie"]."'></td>
          </tr>
          <tr>
          <td><b>Codigo Interno</b></td>
          <td><input type='text' class='form-control' id='codigo_interno' value='".$value["codigo_interno"]."'></td>
          </tr>
          <tr>
          <td><b>Color</b></td>
          <td><input type='text' id='color' class='form-control' value='".$value["color"]."'></td>
          </tr>
          <tr>
          <td><b>Valor $</b></td>
          <td><input type='text' id='valor_activo' class='form-control' value='".$value["valor_activo"]."'></td>
          </tr>
          <tr>
          <td><b>Marca</b></td>
          <td><input type='text' class='form-control' id='marca' value='".$value["marca"]."'></td>
          </tr>
          <tr>
          <td><b>Dimensiones</b></td>
          <td><input type='text' class='form-control' id='dimensiones' value='".$value["dimensiones"]."'></td>
          </tr>
          <tr>
          <td><b>Vida Util</b></td>
          <td><input type='text' class='form-control' id='vida_util' value='".$value["vida_util"]."'></td>
          </tr>"; 
        }
       
        /////////////locales////////////////////////////////
       $list3=$procesoDatos->ListGenerica("local");
       $list_Local="<option value='0' selected>SELECCIONAR....</option>";
       foreach($list3 as $key => $value){
  
       $list_Local.="<option value='".$value["id_local"]."'>".strtoupper($value["local_name"])." </option>"; 
        }

        ///////////////usuarios/////////////////
        $list2=$procesoDatos->ListGenerica("usuario");
        $list_usuario="<option value='0' selected>SELECCIONAR....</option>";
        foreach($list2 as $key => $value){
        
          $list_usuario.="<option value='".$value["id_user"]."'>".strtoupper($value["nom"])." ".strtoupper($value["apellidos"])." (".strtoupper($value["id_user"]).") </option>";
        }

        /////////////locales////////////////////////////////
        $list3=$procesoDatos->ListGenerica("tipo_activo");
       $list_Tactivo="<option value='0' selected>SELECCIONAR....</option>";
        foreach($list3 as $key => $value){
   
        $list_Tactivo.="<option value='".$value["id_tipo_activo"]."'>".strtoupper($value["nom_tipo_activo"])." </option>"; 
           }

        $datos=[
            "nombre"=>$rs[0]["nom_activo"],
            "descripcion"=>$rs[0]["descrip_activo"],
            "img"=>$rs[0]["foto"],
           "filas"=>$fil,
           "usuarios"=>$list_usuario,
           "locales_lis"=>$list_Local,
           "tipos_activo"=>$list_Tactivo
        ];


    echo json_encode($datos);
  }else if($_POST["accion"] == "save_up"){
   
  
    $getImagen="";
    if (isset($_POST['foto'])) {
      $getImagen="";
    }else{
      $image_name = $_FILES['foto']['name'];
      $image_temp = $_FILES['foto']['tmp_name'];
      $image_size = $_FILES['foto']['size'];
       
      //quitamos el nombre que trae por defecto
      $exp = explode(".", $image_name);
      $ext = end($exp);
      $imagen='b'.time().'.'.$ext;
      $def= addslashes(file_get_contents($_FILES['foto']['tmp_name']));
     
      //mover la foto a esta ruta :D
      $ruta="../../img/imgPerfil/".$imagen;
      $foto="img/imgPerfil/".$imagen;
      move_uploaded_file($image_temp,$ruta);
      $getImagen="foto='".$foto."', ";
    }

    $responsable="";
    if ($_POST['respon'] != 0) {
      $responsable="id_reposable='".$_POST['respon']."', ";
    }
   
    $local="";
    if ($_POST['local'] != '0') {
      $local="id_local= '".$_POST['local']."', ";
    }

    //$local=$_POST['local'];

    $tipo="";
    if ($_POST['tipo'] != 0) {
      $tipo=" tipo_activo='".$_POST['tipo']."', ";
    }
    //echo $getImagen;

//UPDATE inventario SET tipo_activo=2,id_local='St-19',id_reposable=360618,nom_activo='Base vip' WHERE id_activo=232

    $query="UPDATE inventario SET ".$getImagen.$responsable.$local.$tipo."codigo_mined='".$_POST['mined']."', codigo_interno='".$_POST['codigo_interno']."', 
   descrip_activo= '".$_POST['descripcion']."', valor_activo='".$_POST['valor_activo']."', marca='".$_POST['marca']."', dimensiones='".$_POST['dimensiones']."',
   serie='".$_POST['serie']."', vida_util='".$_POST['vida_util']."', color='".$_POST['color']."'  
   WHERE id_activo=".$_POST['activo'];
  
   $res=$procesoDatos->sqlConsulta3($query);
  
   echo $res;
  }

}


?>