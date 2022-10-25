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
     $inicio=$_POST["num_limit"]-3;
     $fin=$_POST["num_limit"];
    $query="Select id_activo,codigo_mined,codigo_interno,nom_activo,nom_tipo_activo,descrip_activo,
      valor_activo,marca,modelo,dimensiones,serie,vida_util,local_name,nom,apellidos,foto,fecha_resg
       FROM inventario 
       INNER JOIN tipo_activo ON inventario.tipo_activo = tipo_activo.id_tipo_activo
       INNER JOIN `local` ON inventario.id_local = `local`.id_local
       INNER JOIN usuario ON inventario.id_reposable = usuario.id_user LIMIT ".$inicio.",".$fin;
    
       $fill=$procesoDatos->sqlGenericaArreglo($query);

     $paginas=count($all_information);

     $num_paginas=0;
     if ($paginas < 3) {
      $num_paginas=1;
     }else {
      $num_paginas=ceil($paginas/3);
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
       $g=3*$numero;
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

     $inicio=$_POST["num_limit"]-3; 
     $fin=$_POST["num_limit"];

      $query="Select id_activo,codigo_mined,codigo_interno,nom_activo,nom_tipo_activo,descrip_activo,
      valor_activo,marca,modelo,dimensiones,serie,vida_util,local_name,nom,apellidos,foto,fecha_resg
       FROM inventario 
       INNER JOIN tipo_activo ON inventario.tipo_activo = tipo_activo.id_tipo_activo
       INNER JOIN `local` ON inventario.id_local = `local`.id_local
       INNER JOIN usuario ON inventario.id_reposable = usuario.id_user WHERE ".$where."
      LIMIT  ".$inicio.",".$fin;
     // $sql="SELECT * FROM  inventario WHERE ".$where;
      $rs=$procesoDatos->sqlGenericaArreglo($query);
     

      if ($getColums < 3) {
        $num_paginas=1;
       }else {
        $num_paginas=ceil($getColums/3);
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
         $g=3*$numero;
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
          <td><b>Codigo Mined</b></td>
          <td><input type='text' class='form-control' id='codigo_mined' value='".$value["codigo_mined"]."'></td>
          </tr>
          <tr>
          <td><b>Serie</b></td>
          <td><input type='text' class='form-control ' value='".$value["serie"]."'></td>
          </tr>
          <tr>
          <td><b>Codigo Interno</b></td>
          <td><input type='text' class='form-control' value='".$value["codigo_interno"]."'></td>
          </tr>
          <tr>
          <td><b>Color</b></td>
          <td><input type='text' class='form-control' value='".$value["color"]."'></td>
          </tr>
          <tr>
          <td><b>Valor $</b></td>
          <td><input type='text' class='form-control' value='".$value["valor_activo"]."'></td>
          </tr>
          <tr>
          <td><b>Marca</b></td>
          <td><input type='text' class='form-control' value='".$value["marca"]."'></td>
          </tr>
          <tr>
          <td><b>Dimensiones</b></td>
          <td><input type='text' class='form-control' value='".$value["dimensiones"]."'></td>
          </tr>
          <tr>
          <td><b>Vida Util</b></td>
          <td><input type='text' class='form-control' value='".$value["vida_util"]."'></td>
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
  }

}


?>