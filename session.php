<form action='' method='POST' enctype='multipart/form-data'>
    <input type='text' name='p'>
    <button type='submit' name='save'>Enviar</button>
</form>
<?php

session_start();
// // echo'<pre>';
var_dump($_SESSION['datos']);
// unset($_SESSION['datos'][$_COOKIE['id']]);
    // var_dump($_SESSION['datos'][$_COOKIE['id']][0]);
    // if(isset($_SESSION['datos'][$_COOKIE['id']])){
    //     echo "si existe";

    // }else{
    //     echo "no existe";
          
    // }
    // date_default_timezone_set('america/el_salvador');
    // echo date('m-d-Y');
    // echo "<br> ". date('h:i:s');
// echo'</pre>';

// if(isset($_SESSION['datos'][$_COOKIE['id']])){
//     echo"<br><br><br>";
// echo"si existe";
// echo"<br><br><br>";


// }
// echo'<br><br>';
// setcookie( 'luis', 'sortoluis1994');
// echo 'token de usuario loguiado: '.$_COOKIE['id'];
// session_destroy();
// print_r($_COOKIE);

// require_once 'partes/conexion/conexion.php';

 function decryption($string){
    $key=hash('sha256','superItca');
    $iv=substr(hash('sha256', '037970' ), 0, 16);
    $output=openssl_decrypt(base64_decode($string), 'AES-256-CBC', $key, 0, $iv);
    return $output;
    }


if(isset($_POST['save'])){
    
     $tt=decryption($_POST['p']);
     echo $tt;

}



// $mainstr = "This: is a sim'ple text;";
// echo "Text before remove: \n" . $mainstr, "\n";
// echo"<br>";
// echo "\n\nText after remove: \n" .$replacestr = remove_sp_chr($mainstr);
// function remove_Caracteres($str)
// {
//     $result = str_replace(array("#", ":","'", ";"), '', $str);
//     return $result;
// }

echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
// var_dump($_SESSION['actList']);
// echo $_SESSION['datos'][$_COOKIE['id']][0]
require_once "conexionprueba.php";


// try {
//     $dbh = new PDO('mysql:host=localhost;dbname=sistema_activos1', 'root', '');

//     $stmt = $dbh->prepare("INSERT INTO list_movimientos(
 
//         `id_tipo_mov`,
//         `id_user_entrega`,
//         `id_user_recibe`,
//         `id_local_salida`,
//         `id_local_destino`,
//         `fecha_mov`,
//         `hora_mov`,
//         `justi_mov`
//       )
//       VALUES
//         (
//           2,
//           130123,
//           130122,
//           'St-19',
//           'St-18',
//           '2022-07-13',
//           '11:21:46',
//           'son pruebas'
//         );");

//     try {
//         $stmt->execute();
//         print $dbh->lastInsertId();
//         $dbh->beginTransaction();
//         $dbh->commit();
//     } catch(PDOExecption $e) {
//         $dbh->rollback();
//         print "Error!: " . $e->getMessage() . "</br>";
//     }
// } catch( PDOExecption $e ) {
//     print "Error!: " . $e->getMessage() . "</br>";
// }

// class sqlReg extends Principal {
    
//     public function ListGenerica($dato){
//         $sq->beginTransaction();
//         $sql=Principal::conectar()->prepare($dato);
//         $sq=Principal::conectar();
//         $sq->execute();
//         $sq->commit();
//         $sq->lastInsertId();
//         // $dat=$sql->fetchAll(PDO::FETCH_ASSOC);
//         return $sq;
//     }
// }

// $procesoDatos= new sqlReg ();

// $t=$procesoDatos->ListGenerica("INSERT INTO list_movimientos(
 
//     `id_tipo_mov`,
//     `id_user_entrega`,
//     `id_user_recibe`,
//     `id_local_salida`,
//     `id_local_destino`,
//     `fecha_mov`,
//     `hora_mov`,
//     `justi_mov`
//   )
//   VALUES
//     (
//       2,
//       130123,
//       130122,
//       'St-19',
//       'St-18',
//       '2022-07-13',
//       '11:21:46',
//       'son pruebas'
//     ); SELECT LAST_INSERT_ID();");
// // echo $t[];
// var_dump($_SESSION['actList']);
// $string="";
// foreach($_SESSION['actList'] as $key=>$value){
//    if($_COOKIE['id'] == $value[0]){
//     $string.=$key.",";

//    }
      
// }
// echo $string2=trim($string,",");

// unset($_SESSION['actList']['232'][$_COOKIE["id"]]);

// foreach ($_SESSION['actList'] as $key => $value){
//     if($value[0]==$_COOKIE["id"]){
//         unset($_SESSION['actList'][$key]);
//     }
// }
// session_destroy($_SESSION['actList'])
// session_destroy()
// $string="123,124";
// $p=explode(",", $string);
// echo $t=substr_count($string, ',');
// $string2=trim($string,",");  
// var_dump($p);
// echo "seccion activos".var_dump( $_SESSION[$_COOKIE["id"]]);

// foreach($p as $key){
//     echo $key."\n";  
// }
// session_destroy();
?>
