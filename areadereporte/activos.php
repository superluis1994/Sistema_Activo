<style type="text/css">


table{
    width: 90%;
    margin-left: 5%;
    margin-top: 10px;
    font-size: 10pt;
    border: solid 1px #000;
}
th{
  border: solid 1px blue;
  padding: 7px;

}
tr{
  background: #E7E7E7;
 border: solid 1px blue; 
}

td{
    width: 20%;
    border: solid 1px #444444;
}

div.parrafo{
width: 90%;
margin-top: 10px;
text-align: left;
margin-left: 5%;
font-size: 10pt;
}

</style>

<page backcolor="#FEFEFE"  backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm
" footer="page" style="font-size: 12pt">

  	<table>
  <thead>
    <tr>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    

    <?php
   // session_start();
  require_once "../partes/conexion/sqlRepor.php";
 // require_once "../processReport/Pdf_activo.php";
  $procesoDatos= new sqlReg ();
 
//recupero los valores para la busqueda
$frecuence=explode(",",$_SESSION['url_pdf']);
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

foreach($rs as $key=> $value){
  echo "<tr><td>".$value['nom_activo']."</td><td>".$value['nom_tipo_activo']."</td><td>".$value['local_name']."</td></tr>";
  }


?>
   
  </tbody>
</table>

</page>