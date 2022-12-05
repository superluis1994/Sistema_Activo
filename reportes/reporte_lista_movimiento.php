<?php
//echo $_GET['requireFeed'];
require_once "../partes/conexion/sqlRepor.php";
require('fpd/fpdf.php');
$procesoDatos= new sqlReg ();

$frecuence=explode(",",$_GET['requireFeed']);


$frecuence=explode(",",$_GET['requireFeed']);

$inicio=$frecuence[0];
$fin=$frecuence[1];

$campo="";
if (isset($frecuence[2])) {
   $campo=$frecuence[2]; 
}


$where="";

$writeCols=['id_lis_mov','user_entrega.nom ','user_recibe.nom'];

if($campo != null){
   $where.="WHERE (";
   for ($i=0; $i < count($writeCols) ; $i++) { 
     
     $where.= $writeCols[$i]." LIKE '%".$campo."%' OR ";
   }
   $where=substr_replace($where,"",-3);
   $where.=")";
  }


$quer="SELECT id_lis_mov AS id_mov,user_entrega.nom AS usuario_entrega, user_recibe.nom AS usuario_recibe,tipo_mov AS tipo,
        local_salida.local_name AS local_sal,local_destino.local_name AS local_dest,fecha_mov AS fecha,hora_mov AS hora_mov,
        justi_mov AS justi
        FROM list_movimientos 
        INNER JOIN usuario AS user_entrega ON list_movimientos.id_user_entrega = user_entrega.id_user
        INNER JOIN usuario AS user_recibe ON list_movimientos.id_user_recibe = user_recibe.id_user
        INNER JOIN tipo_movimiento ON list_movimientos.id_tipo_mov = tipo_movimiento.id_mov
        INNER JOIN `local` AS local_salida ON list_movimientos.id_local_salida = local_salida.id_local
        INNER JOIN `local` AS local_destino ON list_movimientos.id_local_destino = local_destino.id_local ".$where." LIMIT ".$inicio.",".$fin;
        $res=$procesoDatos->sqlGenericaArreglo2($quer);

        var_dump($res);
        echo "<br><br>";

        $listas="";
        foreach ($res as $key => $value) {
         # code...
         $listas.="ID =".$value['id_mov']."<br>";
        }
       
        echo json_encode($listas);



?>