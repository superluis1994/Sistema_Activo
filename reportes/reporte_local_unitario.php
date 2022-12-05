<?php

require_once "../partes/conexion/sqlRepor.php";
require('fpd/fpdf.php');
$procesoDatos= new sqlReg ();


$id=$_GET['id'];




$query="SELECT id_local AS id,local_name AS nombre,EN.nom AS jefe,EN.apellidos AS jefeAP,fecha_regis AS fecha,RE.nom AS encarNOM,
    RE.apellidos AS encarAP,estatus FROM local LO
    INNER JOIN usuario EN ON LO.jefe_local=EN.id_user
    INNER JOIN usuario RE ON LO.registradoX=RE.id_user
    WHERE id_local='".$id."'
    ORDER BY nombre";  
    $list=$procesoDatos->sqlGenericaArreglo($query);

    //este arreglo contiene los campos de locales
    var_dump($list);


?>