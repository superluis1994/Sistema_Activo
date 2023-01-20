<?php
require_once "../partes/conexion/sqlRepor.php";
$procesoDatos= new sqlReg ();

//recupero los valores para la busqueda
$frecuence=explode(",",$_GET['requireFeed']);
//var_dump($frecuence);
$inicio=$frecuence[0];
$fin=$frecuence[1];
$campo="";
if (isset($frecuence[2])) {
   $campo=$frecuence[2]; 
}

$columna=['id_activo','nom_activo','nom_tipo_activo'];

$where="";
if($campo != null){
 $where.="WHERE (";
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
 INNER JOIN usuario ON inventario.id_reposable = usuario.id_user ".$where."
LIMIT  ".$inicio.",".$fin;

//contiene el arreglo para recorrer
$rs=$procesoDatos->sqlGenericaArreglo2($query);

$tabla="";
$tabla="<table><th>Nombre</th><th>Tipo activo<th><th>Local</th>";
foreach($rs as $key=> $value){
$tabla.="<tr><td>".$value['nom_activo']."</td><td>".$value['nom_tipo_activo']."</td><td>".$value['local_name']."</td></tr>";
}
$tabla.="</table>";

echo $tabla;

?>