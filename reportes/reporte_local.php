<?php

//echo $_GET['requireFeed'];
require_once "../partes/conexion/sqlRepor.php";
require('fpd/fpdf.php');
$procesoDatos= new sqlReg ();

$frecuence=explode(",",$_GET['requireFeed']);

$inicio=$frecuence[0];
$fin=$frecuence[1];

$campo="";
if (isset($frecuence[2])) {
   $campo=$frecuence[2]; 
}

$columnas = ['id_local','local_name','EN.nom'];


$where="";
if($campo != null){
 $where.="WHERE (";
 for ($i=0; $i < count($columnas) ; $i++) { 
   
   $where.= $columnas[$i]." LIKE '%".$campo."%' OR ";
 }
 $where=substr_replace($where,"",-3);
 $where.=")";
}


$query="SELECT id_local AS id,local_name AS nombre,EN.nom AS jefe,EN.apellidos AS jefeAP,fecha_regis AS fecha,RE.nom AS encarNOM,
    RE.apellidos AS encarAP, estatus FROM LOCAL LO
    INNER JOIN usuario EN ON LO.jefe_local=EN.id_user
    INNER JOIN usuario RE ON LO.registradoX=RE.id_user
     ".$where." ORDER BY nombre ";

   $list=$procesoDatos->sqlGenericaArreglo2($query);

 //este arreglo contiene los campos de locales
   //var_dump($list);

   $nombre="";
   foreach ($list as $key => $value) {
    $nombre.= "nombre ".$value['nombre']."<br>";
   }

   echo json_encode($nombre);
?>