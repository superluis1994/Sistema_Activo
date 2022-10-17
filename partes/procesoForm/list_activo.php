<?php
$resl="";
session_start();
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();


if(isset($_POST["accion"])){

    if($_POST["accion"] == "tabla_list_activo"){

     $fill=$procesoDatos->listaActivos(); 
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
         <td><button type='button' id='update'  value='".$value["id_activo"]."' class='btn btn-primary'>Actualizar</button></td>";
      }
       $filas.="</tr>";
     }      


    echo json_encode($filas);

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
      $query="Select id_activo,codigo_mined,codigo_interno,nom_activo,nom_tipo_activo,descrip_activo,
      valor_activo,marca,modelo,dimensiones,serie,vida_util,local_name,nom,apellidos,foto,fecha_resg
       FROM inventario 
       INNER JOIN tipo_activo ON inventario.tipo_activo = tipo_activo.id_tipo_activo
       INNER JOIN `local` ON inventario.id_local = `local`.id_local
       INNER JOIN usuario ON inventario.id_reposable = usuario.id_user WHERE ".$where."
       LIMIT 0,4";
      $sql="SELECT * FROM  inventario WHERE ".$where;
      $rs=$procesoDatos->sqlGenericaArreglo($query);
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
        <td><button type='button' id='update'  value='".$value["id_activo"]."' class='btn btn-primary'>Actualizar</button></td>";
     }
      $filas.="</tr>";
    }  
  echo json_encode($filas);
      
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
            <td>  <input type='text' class='form-control' value='".$value["id_activo"]."'></td>
          </tr>
          <tr>
          <td><b>Codigo Mined</b></td>
          <td><input type='text' class='form-control' value='".$value["codigo_mined"]."'></td>
          </tr>
          <tr>
          <td><b>Serie</b></td>
          <td><input type='text' class='form-control' value='".$value["serie"]."'></td>
          </tr>
          <tr>
          <td><b>Codigo Interno</b></td>
          <td><input type='text' class='form-control' value='".$value["codigo_interno"]."'></td>
          </tr>
          <tr>
          <td><b>Tipo de Activo</b></td>
          <td><input type='text' class='form-control' value='".$value["nom_tipo_activo"]."'></td>
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
          </tr>
          <tr>
          <td><b>Pertenece</b></td>
          <td><input type='text' class='form-control' value='".$value["local_name"]."'></td>
          </tr>
          <tr>
          <td><b>Fecha de Registro</b></td>
          <td><input type='text' class='form-control' value='".$value["fecha_resg"]."'></td>
          </tr>"; 
        }
       
        ///////////////usuarios/////////////////
        $list2=$procesoDatos->ListGenerica("usuario");
        $list_usuario="<option value='0' selected>SELECCIONAR....</option>";
        foreach($list2 as $key => $value){
        
          $list_usuario.="<option value='".$value["id_user"]."'>".strtoupper($value["nom"])." ".strtoupper($value["apellidos"])." (".strtoupper($value["id_user"]).") </option>";
        
          
        }

        $datos=[
            "nombre"=>$rs[0]["nom_activo"],
            "descripcion"=>$rs[0]["descrip_activo"],
            "img"=>$rs[0]["foto"],
           "filas"=>$fil,
           "usuarios"=>$list_usuario
        ];


    echo json_encode($datos);
  }

}


?>