<?php

require_once "../conexion/sql.php";
date_default_timezone_set('america/el_salvador');
$procesoDatos= new sqlReg ();


// acciones de registrar usuario
// if(isset($_POST["accion"])){



// }
echo $_POST["carnet"];
echo $_POST["fechaIn"];
echo $_POST["fechaFin"];
