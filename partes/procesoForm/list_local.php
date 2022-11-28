<?php
$resl="";
session_start();

// echo json_encode("si");
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();


if(isset($_POST['accion'])){


if($_POST['accion'] == "lista"){
   
    $sql="SELECT id_local AS id,local_name AS nombre,EN.nom AS jefe,EN.apellidos AS jefeAP,fecha_regis AS fecha,RE.nom AS encarNOM,
    RE.apellidos AS encarAP,estatus FROM local LO
    INNER JOIN usuario EN ON LO.jefe_local=EN.id_user
    INNER JOIN usuario RE ON LO.registradoX=RE.id_user
    ORDER BY nombre";
    $getColums=count($procesoDatos->sqlGenericaArreglo($sql));

    //$limiter = $_POST['limiter'];

    $inicio=$_POST["limiter"]-10; 
    $fin=$_POST["limiter"];

   // $btn_report="<button class='btn btn-danger'>Reporte General</button>";
   $btn_report="";
     if ($getColums < 1) {
        $btn_report="<button class='btn btn-danger disabled'>Reporte General</button>";
     }else{
    $btn_report="<a href='reportes/reporte_local.php?requireFeed=".$inicio.",".$fin."' class='btn btn-danger'>Reporte General</a>";
     }

    $query="SELECT id_local AS id,local_name AS nombre,EN.nom AS jefe,EN.apellidos AS jefeAP,fecha_regis AS fecha,RE.nom AS encarNOM,
    RE.apellidos AS encarAP,estatus FROM local LO
    INNER JOIN usuario EN ON LO.jefe_local=EN.id_user
    INNER JOIN usuario RE ON LO.registradoX=RE.id_user
    ORDER BY nombre
    LIMIT ".$inicio.",".$fin;   
    $list=$procesoDatos->sqlGenericaArreglo($query);

    $fila="";
   // $btn_report="";
    foreach ($list as $key => $value) {
        $fila.= "<tr>
        <th scope='row'>".$value["id"]."</th>
        <td>".$value["nombre"]."</td>
        <td>".$value["jefe"]." ".$value['jefeAP']."</td>
        <td>".$value["fecha"]."</td>
        <td>".$value["encarNOM"]." ".$value['encarAP']."</td>";
       
        if($_SESSION["datos"][$_COOKIE["id"]][5]==1){

            if($value["estatus"] == 1){
            
            $fila.="<td><button type='button' value='".$value["id"].",".$value["estatus"].",".$value["nombre"]."' id='btn-statu' class='btn btn-danger'>Desactivar</button></td>
                     <td><button type='button' value='".$value['id']."' id='btn_update' class='btn btn-primary'>Actualizar</button></td>";
      
            }else{
            $fila.="<td><button type='button' value='".$value["id"].",".$value["estatus"].",".$value["nombre"]."' id='btn-statu' class='btn btn-success'>Activar</button></td>
                    <td><button type='button' value='".$value["id"]."' id='btn_update' class='btn btn-primary'>Actualizar</button></td>";
                  
            }
          }
      
          $fila.="</tr>";
    }
      $num_paginas="";
    if ($getColums < 10) {
        $num_paginas=1;
       }else {
        $num_paginas=ceil($getColums/10);
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
         $g=10*$numero;
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

    $salida=[];
    $salida['tabla']=$fila;
    $salida['paginacion']=$paginacion;
    $salida['btn']=$btn_report;
    echo json_encode($salida);


}else if ($_POST['accion'] == "buscar") {


    $campo=$_POST['title'];
    $columnas = ['id_local','local_name','EN.nom'];

    $where="";
   
    $where.="WHERE (";
    for ($i=0; $i < count($columnas) ; $i++) { 
        $where.= $columnas[$i]." LIKE '%".$campo."%' OR ";
    }
    $where=substr_replace($where,"",-3);
    $where.=")";
    
     $sql="SELECT id_local AS id,local_name AS nombre,EN.nom AS jefe,EN.apellidos AS jefeAP,fecha_regis AS fecha,RE.nom AS encarNOM,
     RE.apellidos AS encarAP, estatus FROM LOCAL LO
     INNER JOIN usuario EN ON LO.jefe_local=EN.id_user
     INNER JOIN usuario RE ON LO.registradoX=RE.id_user ".$where;

     $getColums=count($procesoDatos->sqlGenericaArreglo($sql));
     
     $inicio=$_POST["limiter"]-10; 
     $fin=$_POST["limiter"];
     $btn_report="";
     if ($getColums < 1) {
        $btn_report="<button class='btn btn-danger disabled'>Reporte General</button>";
     }else{
        $btn_report="<a href='reportes/reporte_local.php?requireFeed=".$inicio.",".$fin.",". $campo."' class='btn btn-danger'>Reporte General</a>";
    
     }
    
    $query="SELECT id_local AS id,local_name AS nombre,EN.nom AS jefe,EN.apellidos AS jefeAP,fecha_regis AS fecha,RE.nom AS encarNOM,
    RE.apellidos AS encarAP, estatus FROM LOCAL LO
    INNER JOIN usuario EN ON LO.jefe_local=EN.id_user
    INNER JOIN usuario RE ON LO.registradoX=RE.id_user
     ".$where." ORDER BY nombre LIMIT ".$inicio.",".$fin;
   $list=$procesoDatos->sqlGenericaArreglo($query);
   

   $fila="";

   foreach ($list as $key => $value) {
       $fila.= "<tr>
       <th scope='row'>".$value["id"]."</th>
       <td>".$value["nombre"]."</td>
       <td>".$value["jefe"]." ".$value['jefeAP']."</td>
       <td>".$value["fecha"]."</td>
       <td>".$value["encarNOM"]." ".$value['encarAP']."</td>";

       if($_SESSION["datos"][$_COOKIE["id"]][5]==1){

           if($value["estatus"] == 1){
           
           $fila.="<td><button type='button' value='".$value["id"].",".$value["estatus"].",".$value["nombre"]."' id='btn-statu' class='btn btn-danger'>Desactivar</button></td>
                    <td><button type='button' value='".$value['id']."' id='btn_update' class='btn btn-primary'>Actualizar</button></td>";
     
           }else{
           $fila.="<td><button type='button' value='".$value["id"].",".$value["estatus"].",".$value["nombre"]."' id='btn-statu' class='btn btn-success'>Activar</button></td>
                   <td><button type='button' value='".$value["id"]."' id='btn_update' class='btn btn-primary'>Actualizar</button></td>";
                 
           }
         }
     
         $fila.="</tr>";
   }

   $num_paginas="";
    if ($getColums < 10) {
        $num_paginas=1;
       }else {
        $num_paginas=ceil($getColums/10);
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
         $g=10*$numero;
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

   $salida=[];
   $salida['tabla']=$fila;
   $salida['paginacion']=$paginacion;
   $salida['btn']= $btn_report;
   echo json_encode($salida);


}else if($_POST['accion'] == "update"){

    $sql="SELECT id_local AS id,local_name AS nombre,EN.nom AS jefe,EN.apellidos AS jefeAP,fecha_regis AS fecha,RE.nom AS encarNOM,
    RE.apellidos AS encarAP,estatus FROM local LO
    INNER JOIN usuario EN ON LO.jefe_local=EN.id_user
    INNER JOIN usuario RE ON LO.registradoX=RE.id_user WHERE id_local='".$_POST['id']."'";
    $list=$procesoDatos->sqlGenericaArreglo($sql);

    
    $fila="";
    foreach ($list as $key => $value) {
        $fila.= "<div class='mb-3 row'>
        <label for='staticEmail' class='col-sm-2 col-form-label'>ID</label>
        <div class='col-sm-10'>
          <input type='text' readonly class='form-control-plaintext bg-secondary text-white' id='id' value='".$value['id']."'>
        </div>
      </div>
      <div class='mb-3 row'>
      <label for='staticEmail' class='col-sm-2 col-form-label'>Encargado actual</label>
      <div class='col-sm-10'>
        <input type='text' readonly class='form-control-plaintext bg-secondary text-white' value='"." ".$value['jefe']." ".$value['jefeAP']."'>
      </div>
    </div>
    <div class='mb-3 row'>
    <label for='inputPassword' class='col-sm-2 col-form-label'>Nombre: </label>
    <div class='col-sm-10'>
      <input type='text' class='form-control' id='local' value='".$value['nombre']."'>
    </div>
  </div>
      ";
    }

    $list=$procesoDatos->ListGenerica("usuario");
    $resl.="<option value='0' selected>SELECCIONAR....</option>";
    foreach($list as $key => $value){
    
      $resl.="<option value='".$value["id_user"]."'>".strtoupper($value["nom"])." ".strtoupper($value["apellidos"])." (".strtoupper($value["id_user"]).") </option>";
    
      
    }

    $salida=[];
    $salida['tabla']=$fila;
    $salida['usuarios']=$resl;
     echo json_encode($salida);


}else if($_POST['accion'] == "save"){

 $cargo=$_POST['cargo'];
 $local=$_POST['local'];
 $id= $_POST['id'];

 $encargado="";
  if ($cargo != "0") {
    $encargado=", jefe_local='".$_POST['cargo']."' ";
  }
  //UPDATE LOCAL SET local_name='computo 67' WHERE id_local='st-20'
   //$query="UPDATE local SET local_name='".$_POST['local']."' ".$encargado." WHERE id_local= '".$_POST["id"]."'";
   $query="UPDATE LOCAL SET local_name='".$local."' ".$encargado." WHERE id_local='".$id."'";
   $res=$procesoDatos->sqlConsulta3($query);
  
  // echo $res; 

   echo json_encode($res);

}


}

?>