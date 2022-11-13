<?php
session_start();
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();



if(isset($_POST["accion"])){

    
       if($_POST["accion"] == "list_mov_tabla"){
             $fill="";
            //  $respuest=$procesoDatos->tablas($dato);
            $query="SELECT id_lis_mov AS id_mov,user_entrega.nom AS usuario_entrega, user_recibe.nom AS usuario_recibe,tipo_mov AS tipo,
            local_salida.local_name AS local_sal,local_destino.local_name AS local_dest,fecha_mov AS fecha,hora_mov AS hora_mov,
         justi_mov AS justi
            FROM list_movimientos 
            INNER JOIN usuario AS user_entrega ON list_movimientos.id_user_entrega = user_entrega.id_user
            INNER JOIN usuario AS user_recibe ON list_movimientos.id_user_recibe = user_recibe.id_user
            INNER JOIN tipo_movimiento ON list_movimientos.id_tipo_mov = tipo_movimiento.id_mov
            INNER JOIN `local` AS local_salida ON list_movimientos.id_local_salida = local_salida.id_local
            INNER JOIN `local` AS local_destino ON list_movimientos.id_local_destino = local_destino.id_local";

             $respuest=$procesoDatos->sqlConsulta($query);
             $numberRow=count($procesoDatos->sqlGenericaArreglo($query));

             $inicio=$_POST["limiter"]-20;
             $fin=$_POST["limiter"];

             $btn_report="";
        if ($numberRow < 3) {
         $btn_report="<button class='btn btn-danger disabled'>Reporte General</button>";
         }else{
        $btn_report="<a href='reportes/reporte_lista_movimiento.php?requireFeed=".$inicio.",".$fin."' class='btn btn-danger'>Reporte General</a>";
     
       } 
            $quer="SELECT id_lis_mov AS id_mov,user_entrega.nom AS usuario_entrega,user_entrega.apellidos AS apellido, user_recibe.nom AS usuario_recibe,tipo_mov AS tipo,
            local_salida.local_name AS local_sal,local_destino.local_name AS local_dest,fecha_mov AS fecha,hora_mov AS hora_mov,
         justi_mov AS justi
            FROM list_movimientos 
            INNER JOIN usuario AS user_entrega ON list_movimientos.id_user_entrega = user_entrega.id_user
            INNER JOIN usuario AS user_recibe ON list_movimientos.id_user_recibe = user_recibe.id_user
            INNER JOIN tipo_movimiento ON list_movimientos.id_tipo_mov = tipo_movimiento.id_mov
            INNER JOIN `local` AS local_salida ON list_movimientos.id_local_salida = local_salida.id_local
            INNER JOIN `local` AS local_destino ON list_movimientos.id_local_destino = local_destino.id_local LIMIT ".$inicio." , ".$fin;

             $res=$procesoDatos->sqlConsulta($quer);
            foreach($res as $key => $val){
              $id="reportes/reporte_mov.php?ids=".$val["id_mov"];
               $fill.="<tr>
               <th scope='row'>".$val["id_mov"]."</th>
               <td>".$val["usuario_entrega"]." ".$val['apellido']."</td>
               <td>".$val["usuario_recibe"]."</td>
               <td>".$val["local_sal"]."</td>
               <td>".$val["local_dest"]."</td>
               <td>".$val["tipo"]."</td>";
               if($_SESSION["datos"][$_COOKIE["id"]][5]==1){
               $fill.="<td><button type='button' value='".$val["id_mov"]."' id='detalle_mov' class='btn btn-success'>Detalle</button></td>
               <td><a type='button' target='_blank' href='".$id."' value='".$val["id_mov"]."' id='reporteMovT' class='btn btn-danger'>Reporte</a></td>";
               }
               $fill.="</tr>";
            }
            
            if ($numberRow < 20) {
              $num_paginas=1;
            }else{
              $num_paginas=ceil($numberRow/20);
            }

            $next="";
            $paginacion ="";
            // aqui creo los registros de paginacion fila por fila siempre y cuando la num pagina sea mayor a 2
            if($num_paginas > 1){
            for($a=0;$a<$num_paginas;$a++){
              $numero=$a+1;
              $g=20*$numero;
              $paginacion.="<li class='page-item ' aria-current='page'>
              <a class='page-link' name='".$g."' id='pagUser' >".$numero."</a>
              </li>";
             
            }
          }
          
            $salida=[];
            $salida['tabla']=$fill;
            $salida['paginate']=$paginacion;
            $salida['btn_reporte']=$btn_report;
            echo json_encode($salida);

       }
       if($_POST["accion"] == "datos_mov"){
         $respues=[];
         $fil=[];

         $sql="SELECT id_lis_mov,user_entrega.nom AS entregaU,user_recibe.nom AS recibeU,local_salida.local_name AS local_s,local_destino.local_name AS local_d,fecha_mov,hora_mov,justi_mov,id_activos,tipo_mov  
         FROM list_movimientos 
         INNER JOIN usuario AS user_entrega ON list_movimientos.id_user_entrega = user_entrega.id_user
                     INNER JOIN usuario AS user_recibe ON list_movimientos.id_user_recibe = user_recibe.id_user
                     INNER JOIN `local` AS local_salida ON list_movimientos.id_local_salida = local_salida.id_local
                     INNER JOIN `local` AS local_destino ON list_movimientos.id_local_destino = local_destino.id_local
                     INNER JOIN detalle_movimientos ON list_movimientos.id_lis_mov = detalle_movimientos.id_mov
                     INNER JOIN tipo_movimiento ON tipo_movimiento.id_mov = list_movimientos.id_tipo_mov 
                     WHERE id_lis_mov=".$_POST["id"];
         $detalleMov=$procesoDatos->sqlConsulta($sql);
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
            foreach($consulta as $key => $value){
          $list_activo.="<div class='card mb-3' style='max-width: 540px;'>
          <div class='row g-0'>
            <div class='col-md-4'>
              <img src='".$value["foto"]."' class='img-fluid rounded-start' alt='...'>
            </div>
            <div class='col-md-8'>
              <div class='card-body'>
                <h5 class='card-title'>".$value["nom_activo"]." ( ID: ".$value["id_activo"].")</h5>
                <p class='card-text'>".$value["descrip_activo"]."</p>
                
                <p class='card-text'><small class='text-muted'>Serie: ".$value["serie"]." </small></p>
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
      }else if ($_POST['accion']=="buscar") {
        $fill="";
        $campo=$_POST['buscar'];
        $where="";

        $writeCols=['id_lis_mov','user_entrega.nom ','user_recibe.nom'];
        $where.="WHERE (";
        for ($i=0; $i < count($writeCols) ; $i++) { 
         $where.= $writeCols[$i]." LIKE '%".$campo."%' OR "; 
        }

        $where=substr_replace($where,"",-3);
        $where.=")";

        $query="SELECT id_lis_mov AS id_mov,user_entrega.nom AS usuario_entrega, user_recibe.nom AS usuario_recibe,tipo_mov AS tipo,
        local_salida.local_name AS local_sal,local_destino.local_name AS local_dest,fecha_mov AS fecha,hora_mov AS hora_mov,
        justi_mov AS justi
        FROM list_movimientos 
        INNER JOIN usuario AS user_entrega ON list_movimientos.id_user_entrega = user_entrega.id_user
        INNER JOIN usuario AS user_recibe ON list_movimientos.id_user_recibe = user_recibe.id_user
        INNER JOIN tipo_movimiento ON list_movimientos.id_tipo_mov = tipo_movimiento.id_mov
        INNER JOIN `local` AS local_salida ON list_movimientos.id_local_salida = local_salida.id_local
        INNER JOIN `local` AS local_destino ON list_movimientos.id_local_destino = local_destino.id_local ".$where;
        
        $reply=$procesoDatos->sqlConsulta($query);
        $numberRow=count($procesoDatos->sqlGenericaArreglo($query));

        $inicio=$_POST["limiter"]-20;
        $fin=$_POST["limiter"];

        $btn_report="";
        if ($numberRow < 3) {
         $btn_report="<button class='btn btn-danger disabled'>Reporte General</button>";
         }else{
        $btn_report="<a href='reportes/reporte_lista_movimiento.php?requireFeed=".$inicio.",".$fin.",". $campo."' class='btn btn-danger'>Reporte General</a>";
     
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
        $res=$procesoDatos->sqlConsulta($quer);
      foreach ($res as $key => $val) {

        $id="reportes/reporte_mov.php?ids=".$val["id_mov"];
        $fill.="<tr>
        <th scope='row'>".$val["id_mov"]."</th>
        <td>".$val["usuario_entrega"]."</td>
        <td>".$val["usuario_recibe"]."</td>
        <td>".$val["local_sal"]."</td>
        <td>".$val["local_dest"]."</td>
        <td>".$val["tipo"]."</td>";
        
        if($_SESSION["datos"][$_COOKIE["id"]][5]==1){
        $fill.="<td><button type='button' value='".$val["id_mov"]."' id='detalle_mov' class='btn btn-success'>Detalle</button></td>
        <td><a type='button' target='_blank' href='".$id."' value='".$val["id_mov"]."' id='reporteMovT' class='btn btn-danger'>Reporte</a></td>";
        }
        $fill.="</tr>";
      }

         
      if ($numberRow < 20) {
        $num_paginas=1;
      }else{
        $num_paginas=ceil($numberRow/20);
      }

      $next="";
      $paginacion ="";
      // aqui creo los registros de paginacion fila por fila siempre y cuando la num pagina sea mayor a 2
      if($num_paginas > 1){
      for($a=0;$a<$num_paginas;$a++){
        $numero=$a+1;
        $g=20*$numero;
        $paginacion.="<li class='page-item ' aria-current='page'>
        <a class='page-link' name='".$g."' id='pagUser' >".$numero."</a>
        </li>";
       
      }
    }

      $salida=[];
      $salida['tabla']=$fill;
      $salida['paginate']=$paginacion;
      $salida['btn_reporte']=$btn_report;
      echo json_encode($salida);
      }
     
}


?>