<?php
session_start();
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();



if(isset($_POST["accion"])){

    
       if($_POST["accion"] == "list_mov_tabla"){
             $fill="";
             $dato=[
                "tabla"=>"SELECT id_lis_mov AS id_mov,user_entrega.nom AS usuario_entrega, user_recibe.nom AS usuario_recibe,tipo_mov AS tipo,
                 local_salida.local_name AS local_sal,local_destino.local_name AS local_dest
                 FROM list_movimientos 
                 INNER JOIN usuario AS user_entrega ON list_movimientos.id_user_entrega = user_entrega.id_user
                 INNER JOIN usuario AS user_recibe ON list_movimientos.id_user_recibe = user_recibe.id_user
                 INNER JOIN tipo_movimiento ON list_movimientos.id_tipo_mov = tipo_movimiento.id_mov
                 INNER JOIN `local` AS local_salida ON list_movimientos.id_local_salida = local_salida.id_local
                 INNER JOIN `local` AS local_destino ON list_movimientos.id_local_destino = local_destino.id_local",
                "inferior"=>"0",
                "superior"=>"20"
             ];
            //  $respuest=$procesoDatos->tablas($dato);
             $respuest=$procesoDatos->detalle();
            foreach($respuest as $key => $val){
               $fill.="<tr>
               <th scope='row'>".$val["id_mov"]."</th>
               <td>".$val["usuario_entrega"]."</td>
               <td>".$val["usuario_recibe"]."</td>
               <td>".$val["local_sal"]."</td>
               <td>".$val["local_dest"]."</td>
               <td>".$val["tipo"]."</td>
               <td><button type='button' value='".$val["id_mov"]."' id='detalle_mov' class='btn btn-success'>Detalle</button></td>
               </tr>";
            }
    echo json_encode($fill);

       }
     
}


?>