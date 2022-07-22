<?php
session_start();
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();



if(isset($_POST["accion"])){

    
       if($_POST["accion"] == "list_mov_tabla"){
             $fill="";
         
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
       if($_POST["accion"] == "datos_mov"){
         $respues=[];
         // $dato=[
         //    "tabla"=>"list_movimientos 
         //    INNER JOIN detalle_movimientos ON list_movimientos.id_lis_mov = detalle_movimientos.id_mov
         //    INNER JOIN tipo_movimiento ON tipo_movimiento.id_mov = list_movimientos.id_tipo_mov 
         //    INNER JOIN usuario AS user_entrega ON list_movimientos.id_user_entrega = user_entrega.id_user
         //    INNER JOIN usuario AS user_recibe ON list_movimientos.id_user_recibe = user_recibe.id_user",
         //    "campo"=>"id_lis_mov",
         //    "codigo"=>$_POST["id"]
         // ];
         $fil=[];

         $sql="SELECT id_lis_mov,user_entrega.nom AS entregaU,user_recibe.nom AS recibeU,local_salida.local_name AS local_s,local_destino.local_name AS local_d,fecha_mov,hora_mov,justi_mov,id_activos,tipo_mov  
         FROM list_movimientos 
         INNER JOIN usuario AS user_entrega ON list_movimientos.id_user_entrega = user_entrega.id_user
                     INNER JOIN usuario AS user_recibe ON list_movimientos.id_user_recibe = user_recibe.id_user
                     INNER JOIN `local` AS local_salida ON list_movimientos.id_local_salida = local_salida.id_local
                     INNER JOIN `local` AS local_destino ON list_movimientos.id_local_destino = local_destino.id_local
                     INNER JOIN detalle_movimientos ON list_movimientos.id_lis_mov = detalle_movimientos.id_mov
                     INNER JOIN tipo_movimiento ON tipo_movimiento.id_mov = list_movimientos.id_tipo_mov 
                     WHERE id_lis_mov = ";
         $detalleMov=$procesoDatos->sqlConsulta($sql."".$_POST["id"]);
         // $detalle="";
         foreach($detalleMov as $key => $val){
           $respues=[
            "justificacion" => $val["justi_mov"],
            "user_entr" => $val["entregaU"],
            "User_reci" => $val["recibeU"],
            "local_sali" => $val["local_s"],
            "local_des" => $val["local_d"],
            "tipoM" => $val["tipo_mov"],
            "fecha" => $val["fecha_mov"],
            "hora" => $val["hora_mov"],
            "id" => $val["id_activos"]
           ];
         }


         $array=explode(",", $respues["id"]);
         // $respues.["id"=>$array];
         $list_activo="";
         foreach($array as $item){
             $dato=[
            "tabla"=>"inventario",
            "campo"=>"id_activo",
            "codigo"=>$item
         ];
         $consulta=$procesoDatos->listaPersonalizada($dato);
            foreach($consulta as $key => $val){
          $list_activo.="<div class='card mb-3' style='max-width: 540px;'>
          <div class='row g-0'>
            <div class='col-md-4'>
              <img src='...' class='img-fluid rounded-start' alt='...'>
            </div>
            <div class='col-md-8'>
              <div class='card-body'>
                <h5 class='card-title'>Card title</h5>
                <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                
                <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>";

         
         }
      }
      // array_push($respues,"fill"=>[$list_activo]);
      // $respues.=["fil"=>$list_activo];
      $respues["fill"]=$list_activo;
         echo json_encode($respues);
      }
     
}


?>